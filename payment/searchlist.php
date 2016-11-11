<?php

/*
	searchlist.php

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

if(empty($Order) || $Order !== 'PAYMENTID' && $Order !== 'LASTNAME,FIRSTNAME,COMPANY' && $Order !== 'P.PAYMENT_DATE' && $Order !== 'SUM_PAID' && $Order !== 'METHOD_OF_PAY')
{
	$Order = "P.PAYMENT_DATE DESC,P.PAYMENTID DESC";
	$Sort = "";
}

$Searchstring = "CustomerNo_1=$CustomerNo_1&amp;InvoiceNo_1=$InvoiceNo_1&amp;PaymentNo_1=$PaymentNo_1&amp;SumPaid_1=$SumPaid_1&amp;DateFrom_1=$DateFrom_1&amp;DateTill_1=$DateTill_1&amp;MethodOfPay_1=$MethodOfPay_1";
$smarty->assign("Searchstring",$Searchstring);

$smarty->assign("Title","$a[payment] - $a[searchresult]");
$smarty->assign("First_Name","$a[firstname]");
$smarty->assign("Last_Name","$a[lastname]");
$smarty->assign("Company_Name","$a[company]");
$smarty->assign("Customer_No","$a[customer_no]");
$smarty->assign("Customer","$a[customer]");
$smarty->assign("EntryCanceled","$a[entry_canceled]");
$smarty->assign("NewEntry","$a[new_entry]");
$smarty->assign("Payment_No","$a[payment_number]");
$smarty->assign("Payment_Sum","$a[payment_sum]");
$smarty->assign("Total_Payment","$a[total_payment]");
$smarty->assign("Open_Account","$a[open_account]");
$smarty->assign("Method_Of_Payment","$a[method_of_payment]");
$smarty->assign("DateFrom","$a[date_from]");
$smarty->assign("DateTill","$a[date_till]");

// Database connection
//
DBConnect();

// Get data from company_settings.inc.php
//
$smarty->assign("Payment_Currency",$CompanyCurrency);

$intCursor = ($page - 1) * $EntrysPerPage;

// Get Payment Information
//
$DateFrom_1 = German_Mysql_Date($DateFrom_1);
$DateTill_1 = German_Mysql_Date($DateTill_1);

if(isset($Canceled) && $Canceled == 1)
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE P.CANCELED=1 AND A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1 ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
}
else if(isset($Canceled) && $Canceled == 3)
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1 ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
}
else
{
	$query = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE P.CANCELED=2 AND A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1 ORDER BY $Order $Sort LIMIT $intCursor, $EntrysPerPage");
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
		$query1 = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE P.CANCELED=1 AND A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1");
	}
	else if(isset($Canceled) && $Canceled == 3)
	{
		$query1 = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1");
	}
	else
	{
		$query1 = $db->Execute("SELECT A.MYID, A.FIRSTNAME, A.LASTNAME, A.COMPANY,  P.CREATEDBY, P.PAYMENTID, P.INVOICEID, P.MYID, DATE_FORMAT(P.PAYMENT_DATE,'%d.%m.%Y') AS PAYMENT_DATE, P.SUM_PAID, P.METHOD_OF_PAY, P.CANCELED FROM payment AS P, addressbook AS A
		WHERE P.CANCELED=2 AND A.MYID=P.MYID AND P.MYID LIKE '$CustomerNo_1%' AND P.INVOICEID LIKE '%$InvoiceNo_1%' AND P.PAYMENTID LIKE '%$PaymentNo_1%' AND P.SUM_PAID LIKE '%$SumPaid_1%'
		AND P.PAYMENT_DATE >= '$DateFrom_1' AND P.PAYMENT_DATE <= '$DateTill_1' $MethodOfPay_1");
	}

	$numrows = $query1->RecordCount();

	$TotalSearchresult = 0;

	foreach($query1 as $result1)
	{
		// Save Total Page Sum Paid by searchresult
		//
		$TotalSearchresult += $result1['SUM_PAID'];
		$smarty->assign("TOTAL_SEARCHRESULT",$TotalSearchresult);
	}

	// Save MaxPages
	//
	$intPages = ceil($numrows/$EntrysPerPage);

	$TotalPage = 0;

	// Save all entrys in $PaymentData array
	//
	foreach($query as $result)
	{
		$PaymentData[] = $result;

		// Save Total Page Sum Paid
		//
		$TotalPage += $result['SUM_PAID'];
		$smarty->assign("TOTAL_PAGE",$TotalPage);
	}

	if(isset($PaymentData))
		$smarty->assign('PaymentData', $PaymentData);
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

// Calculate total paid sum
//
$query5 = $db->Execute("SELECT SUM(SUM_PAID) AS SUM_PAID FROM payment WHERE CANCELED=2");

$TotalAmount = 0;

// If an error has occurred, display the error message
//
if (!$query5)
	print($db->ErrorMsg());
else
	foreach($query5 as $result5)
	{
		$TotalAmount += $result5['SUM_PAID'];
		$smarty->assign("TOTAL_AMOUNT",$TotalAmount);
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

$smarty->display('payment/searchlist.tpl');

unset($_SESSION['CancelID']);
unset($_SESSION['NewID']);
unset($_SESSION['Type']);

?>
