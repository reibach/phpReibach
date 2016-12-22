<?php

/*
	deletef.php

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
else
{
	// Database connection
	//
	DBConnect();
	$query1 = $db->Execute("SELECT artgroupsID FROM article WHERE artgroupsID=$artgroupsID");
	$numrows1 = $query1->RowCount();

	if ($numrows1)
	{
		$smarty->assign("FieldError","$a[position] - $a[art_groups] - $a[entry_not_deleted]");
		$smarty->display('artgroups/deletef.tpl');
	}
	else
	{
		$query2 = "DELETE FROM artgroups WHERE artgroupsID=$artgroupsID";

		if ($db->Execute($query2) === false)
		{
			die($db->ErrorMsg());
		}

		$query3 = "INSERT INTO syslog (SYSLOGID, CREATED, DESCRIPTION, CREATEDBY, USERGROUP1, USERGROUP2)";
		$query3 .= "VALUES(NULL, '$CurrentDateTime', 'artgroups-No.: $artgroupsID was DELETED by user $_SESSION[Username] (uid=$_SESSION[UserID]) from $IPAddress', 'admin', '1', '2')";
		if ($db->Execute($query3) === false)
		{
			die($db->ErrorMsg());
		}

		$_SESSION['DeleteID'] = "1";

		if($infoID == '9')
		{
			Header("Location: $web/artgroups/searchlist.php?artgroupsID=$artgroupsID&page=$page&Description_1=$Description_1&Order=$Order&Sort=$Sort&$sessname=$sessid");
		}
		else
		{
			Header("Location: $web/artgroups/list.php?artgroupsID=$artgroupsID&page=$page&Order=$Order&Sort=$Sort&$sessname=$sessid");
		}
	}
}

?>
