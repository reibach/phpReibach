<?php

/*
	newf.php

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
CheckAdminGroup1();
CheckSession();

$ArrayValue = CheckArrayValue($_REQUEST);

foreach($ArrayValue as $key => $val)
{
	$$key = $val;
	$smarty->assign("$key",$val);
}

function UserInput($mark)
{
	global $smarty;

	$smarty->assign("mark",$mark);
}

if (empty($Method_Of_Payment))
{
	$smarty->assign("FieldError","$a[method_of_payment] - $a[field_error]");
	UserInput("Method_Of_Payment");
	$smarty->display('methodofpayment/newf.tpl');
}
else
{
	// Database connection
	//
	DBConnect();
	$query1 = $db->Execute("SELECT DESCRIPTION FROM methodofpay WHERE DESCRIPTION='$Method_Of_Payment'");
	$numrows1 = $query1->RowCount();

	if ($numrows1)
	{
		$smarty->assign("FieldError","$a[entry_exist]");
		UserInput("Method_Of_Payment");
		$smarty->display('methodofpayment/newf.tpl');
	}
	else
	{
		$query2 = "INSERT INTO methodofpay (METHODOFPAYID, DESCRIPTION, CREATEDBY, MODIFIEDBY, USERGROUP1, USERGROUP2, CREATED, MODIFIED)";
		$query2 .= "VALUES(NULL, '$Method_Of_Payment','$_SESSION[Username]','$_SESSION[Username]', '$_SESSION[Usergroup1]', '$_SESSION[Usergroup2]', '$CurrentDateTime', '$CurrentDateTime')";

		if ($db->Execute($query2) === false)
		{
			die($db->ErrorMsg());
		}

		$_SESSION['NewID'] = "1";

		Header("Location: $web/methodofpayment/new.php?page=$page&$sessname=$sessid");
	}
}

?>
