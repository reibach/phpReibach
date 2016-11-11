<?php

/*
	position_sales_summary.php

	phpRechnung - is easy-to-use Web-based multilingual accounting software.
	Copyright (C) 2001 - 2015 Edy Corak < edy at loenshotel dot de >

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require_once("../include/phprechnung.inc.php");
require_once("../include/smarty.inc.php");

CheckUser();
CheckAdminGroup3();
CheckSession();

$ArrayValue = CheckArrayValue($_REQUEST);

foreach($ArrayValue as $key => $val)
{
	$$key = $val;
	$smarty->assign("$key",$val);
}

if(!isset($page) || !is_numeric($page) || $page <= 0 )
{
	$page = 1;
}

if(!isset($Sort) || $Sort !== 'ASC' && $Sort !== 'DESC')
{
	$Sort = "";
	$smarty->assign("Sort","$Sort");
}

if(empty($Order) || $Order !== 'V.POSITIONID' && $Order !== 'POS_DESC' && $Order !== 'POS_QUANTITY' && $Order !== 'POS_AMOUNT')
{
	$Order = "POS_AMOUNT DESC";
	$Sort = "";
	$smarty->assign("Order","$Order");
	$smarty->assign("Sort","$Sort");
}

$smarty->assign("Title","$a[reports] - $a[position_sales] - $a[summary]");
$smarty->assign("SearchResult","$a[position_sales] - $a[summary]");
$smarty->assign("PositionName","$a[pos_name]");
$smarty->assign("PositionText","$a[pos_text]");
$smarty->assign("PositionQuantity","$a[pos_quantity]");
$smarty->assign("PositionPrice","$a[pos_price]");
$smarty->assign("PositionAmount","$a[pos_amount]");
$smarty->assign("Date_From","$a[date_from]");
$smarty->assign("Date_Till","$a[date_till]");

// Database connection
//
DBConnect();

// Get lines per page and currency from settings table
//
$smarty->assign("Currency","$CompanyCurrency");

$intCursor = ($page - 1) * $EntrysPerPage;

$DateFrom = German_Mysql_Date($DateFrom);
$DateTill = German_Mysql_Date($DateTill);

$query = $db->Execute("SELECT I.INVOICEID, I.CANCELED, I.INVOICE_DATE, P.POSITIONID, P.POS_NAME, P.POS_DESC, V.POSITIONID, SUM(V.POS_QUANTITY) AS POS_QUANTITY, SUM(V.POS_QUANTITY*V.POS_PRICE) AS POS_AMOUNT, V.POS_GROUP, V.INVOICEID, V.INVOICEPOSID FROM invoice AS I, article AS P, invoicepos AS V WHERE I.INVOICEID=V.INVOICEID AND I.CANCELED=2 AND P.POSITIONID=V.POSITIONID AND TO_DAYS(I.INVOICE_DATE) BETWEEN TO_DAYS('$DateFrom') AND TO_DAYS('$DateTill') GROUP BY V.POSITIONID ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");

// If an error has occurred, display the error message
//
if (!$query)
	print($db->ErrorMsg());
else
	$pagenumrows = $query->RecordCount();

	// Count MaxRows depend on searchstring
	//
	$query1 = $db->Execute("SELECT I.INVOICEID, I.CANCELED, I.INVOICE_DATE, P.POSITIONID, P.POS_NAME, P.POS_DESC, V.POSITIONID, SUM(V.POS_QUANTITY) AS POS_QUANTITY, SUM(V.POS_QUANTITY*V.POS_PRICE) AS POS_AMOUNT, V.POS_GROUP, V.INVOICEID, V.INVOICEPOSID FROM invoice AS I, article AS P, invoicepos AS V WHERE I.INVOICEID=V.INVOICEID AND I.CANCELED=2 AND P.POSITIONID=V.POSITIONID AND TO_DAYS(I.INVOICE_DATE) BETWEEN TO_DAYS('$DateFrom') AND TO_DAYS('$DateTill') GROUP BY V.POSITIONID");
	$numrows = $query1->RecordCount();

	$TotalAmount = 0;

	foreach($query1 as $result1)
	{
		$TotalAmount += $result1['POS_AMOUNT'];
		$smarty->assign("TOTAL_AMOUNT",$TotalAmount);
	}

	// Save MaxPages
	//
	$intPages = ceil($numrows/$EntrysPerPage);

	$TotalPage = 0;

	// Save all entrys in $Position
	//
	foreach($query as $result)
	{
		$Position[] = $result;
		$TotalPage += $result['POS_AMOUNT'];
		$smarty->assign("TOTAL_PAGE",$TotalPage);
	}

	if(isset($Position))
		$smarty->assign('Positions', $Position);

	$smarty->assign("PageRows","$pagenumrows");
	$smarty->assign("MaxRows","$numrows");

// Display pager only if $numrows > $EntrysPerPage ( lines per page )
// from settings menu
//
if ($numrows > $EntrysPerPage)
{
	$smarty->assign('CurrentPage', "$page");
	$smarty->assign('MaxPages', "$intPages");
	$smarty->assign('AddCurrentPage', "page=$page&amp;");

	// If we are not on first page then display
	// first page, previous page link
	//
	if ($page > 1)
	{
		$Page = $page - 1;
		$smarty->assign('PrevPage', "$Page");
	}

	// If we are not on the last page then display
	// next page, last page link
	//
	if ($page < $intPages)
	{
		$Page = $page + 1;
		$smarty->assign('NextPage', "$Page");
	}
}

$smarty->display('reports/position_sales_summary.tpl');

?>
