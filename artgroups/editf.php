<?php

/*
	editf.php

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

if(!is_numeric($artgroupsID) || $artgroupsID <= 0 )
{
	die(header("Location: $web"));
}

// Database connection
//
DBConnect();

function UserInput($mark)
{
	global $smarty;

	$smarty->assign("mark",$mark);
}

if (empty($Cartgroups))
{
	$smarty->assign("FieldError","$a[position] - $a[art_groups] - $a[field_error]");
	UserInput("Cartgroups");
	$smarty->display('artgroups/editf.tpl');
}
else
{
	$query1 = $db->Execute("SELECT artgroupsID, DESCRIPTION FROM artgroups WHERE DESCRIPTION='$Cartgroups' AND artgroupsID != $artgroupsID");
	$numrows1 = $query1->RowCount();

	if ($numrows1)
	{
		$smarty->assign("FieldError","$a[entry_exist]");
		UserInput("Cartgroups");
		$smarty->display('artgroups/editf.tpl');
	}
	else
	{
		$query2 = "UPDATE artgroups SET DESCRIPTION='$Cartgroups', MODIFIEDBY='$_SESSION[Username]', MODIFIED='$CurrentDateTime' WHERE artgroupsID=$artgroupsID";

		if ($db->Execute($query2) === false)
		{
			die($db->ErrorMsg());
		}

		$_SESSION['EditID'] = "1";

		if($infoID == '9')
		{
			Header("Location: $web/artgroups/searchlist.php?artgroupsID=$artgroupsID&page=$page&Description_1=$Description_1&Order=$Order&Sort=$Sort&$sessname=$sessid#$artgroupsID");
		}
		else
		{
			Header("Location: $web/artgroups/list.php?artgroupsID=$artgroupsID&page=$page&Order=$Order&Sort=$Sort&$sessname=$sessid#$artgroupsID");
		}
	}
}

?>
