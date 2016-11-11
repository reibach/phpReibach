<?php

/*
	list.php

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
CheckSession();
UserSite();

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
}

if(empty($Order) || $Order !== 'INVOICEID' && $Order !== 'LASTNAME,FIRSTNAME,COMPANY' && $Order !== 'I.INVOICE_DATE' && $Order !== 'TOTAL_AMOUNT' && $Order !== 'TOTAL_AMOUNT-SUM_PAID')
{
	$Order = "I.INVOICE_DATE DESC,I.INVOICEID DESC";
	$Sort = "";
}

$smarty->assign("Title","$a[invoice] - $a[list]");
$smarty->assign("First_Name","$a[firstname]");
$smarty->assign("Last_Name","$a[lastname]");
$smarty->assign("Company_Name","$a[company]");
$smarty->assign("Customer_No","$a[customer_no]");
$smarty->assign("Customer","$a[customer]");
$smarty->assign("EntryChanged","$a[entry_changed]");
$smarty->assign("EntryCanceled","$a[entry_canceled]");
$smarty->assign("NewEntry","$a[new_entry]");
$smarty->assign("Email_OK","$a[email_ok]");
$smarty->assign("Email_Error","$a[email_error]");
$smarty->assign("Invoice_No","$a[invoice_number]");
$smarty->assign("Delivery_Note_No","$a[delivery_note_number]");
$smarty->assign("Invoice_Amount","$a[invoice_amount]");
$smarty->assign("Invoice_Transaction","$a[invoice_transaction]");
$smarty->assign("Open_Account","$a[open_account]");
$smarty->assign("Print_Invoice","$a[print_invoice]");
$smarty->assign("Print_Delivery_Note","$a[print_delivery_note]");

// Database connection
//
DBConnect();

// Get data from company_settings.inc.php
//
$smarty->assign("Invoice_Currency",$CompanyCurrency);

$intCursor = ($page - 1) * $EntrysPerPage;

// Get Invoice Information
//
if(isset($Canceled) && $Canceled == 1)
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY, I.CREATEDBY, I.INVOICEID, I.MYID, DATE_FORMAT(I.INVOICE_DATE,'%d.%m.%Y') AS INVOICE_DATE, I.TOTAL_AMOUNT, I.PAID, I.SUM_PAID, I.CANCELED FROM invoice AS I, addressbook AS A WHERE CANCELED=1 AND A.MYID=I.MYID ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
}
else if(isset($Canceled) && $Canceled == 3)
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY, I.CREATEDBY, I.INVOICEID, I.MYID, DATE_FORMAT(I.INVOICE_DATE,'%d.%m.%Y') AS INVOICE_DATE, I.TOTAL_AMOUNT, I.PAID, I.SUM_PAID, I.CANCELED FROM invoice AS I, addressbook AS A WHERE A.MYID=I.MYID ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
}
else
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY, I.CREATEDBY, I.INVOICEID, I.MYID, DATE_FORMAT(I.INVOICE_DATE,'%d.%m.%Y') AS INVOICE_DATE, I.TOTAL_AMOUNT, I.PAID, I.SUM_PAID, I.CANCELED FROM invoice AS I, addressbook AS A WHERE CANCELED=2 AND A.MYID=I.MYID ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
}

// If an error has occurred, display the error message
//
if (!$query)
	print($db->ErrorMsg());
else
	// Count PageRows
	//
	$pagenumrows = $query->RecordCount();

	// Count MaxRows
	//
	if(isset($Canceled) && $Canceled == 1)
	{
		$query1 = $db->Execute("SELECT INVOICEID FROM invoice WHERE CANCELED=1");
	}
	else if(isset($Canceled) && $Canceled == 3)
	{
		$query1 = $db->Execute("SELECT INVOICEID FROM invoice");
	}
	else
	{
		$query1 = $db->Execute("SELECT INVOICEID FROM invoice WHERE CANCELED=2");
	}

	$numrows = $query1->RecordCount();

	// Save MaxPages
	//
	$intPages = ceil($numrows/$EntrysPerPage);

	$TotalPage = 0;

	// Save all entrys in $InvoiceData array
	//
	foreach($query as $result)
	{
		$InvoiceData[] = $result;

		// Save Total Page Entrys
		//
		$TotalPage += $result['TOTAL_AMOUNT'];
		$smarty->assign("TOTAL_PAGE",$TotalPage);
	}

	if(isset($InvoiceData))
		$smarty->assign('InvoiceData', $InvoiceData);

	$smarty->assign("PageRows","$pagenumrows");
	$smarty->assign("MaxRows","$numrows");

// Get information from selected customer
//
if(isset($myID) && is_numeric($myID))
{
	$query3 = $db->Execute("SELECT LASTNAME, FIRSTNAME, COMPANY, MYID FROM addressbook WHERE MYID='$myID'");

	// If an error has occurred, display the error message
	//
	if (!$query3)
		print($db->ErrorMsg());
	else
		foreach($query3 as $result3)
		{
			$smarty->assign("FIRSTNAME","$result3[FIRSTNAME]");
			$smarty->assign("LASTNAME","$result3[LASTNAME]");
			$smarty->assign("COMPANY","$result3[COMPANY]");
			$smarty->assign("MYID","$result3[MYID]");
		}
}

// Calculate total amount
//
$query4 = $db->Execute("SELECT SUM(TOTAL_AMOUNT) AS TOTAL_AMOUNT FROM invoice WHERE CANCELED=2");

$Total_Amount = 0;

// If an error has occurred, display the error message
//
if (!$query4)
	print($db->ErrorMsg());
else
	foreach($query4 as $result4)
	{
		$Total_Amount += $result4['TOTAL_AMOUNT'];
		$smarty->assign("TOTAL_AMOUNT",$Total_Amount);
	}

// Calculate total sum paid
//
$query5 = $db->Execute("SELECT SUM(SUM_PAID) AS SUM_PAID FROM invoice WHERE CANCELED=2");

$Sum_Paid = 0;

// If an error has occurred, display the error message
//
if (!$query5)
	print($db->ErrorMsg());
else
	foreach($query5 as $result5)
	{
		$Sum_Paid += $result5['SUM_PAID'];
		$smarty->assign("OPEN_ACCOUNT",$Total_Amount-$Sum_Paid);
	}

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

$smarty->display('invoice/list.tpl');

unset($_SESSION['EditID']);
unset($_SESSION['CancelID']);
unset($_SESSION['NewID']);
unset($_SESSION['emailID']);
unset($_SESSION['Type']);

?>
