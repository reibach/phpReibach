<?php
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

if (empty($CArtGroups))
{
	$smarty->assign("FieldError","$a[article] - $a[art_groups] - $a[field_error]");
	UserInput("CArtGroups");
	$smarty->display('artgroups/editf.tpl');
}
else
{
	$query1 = $db->Execute("SELECT ARTGROUPSID, DESCRIPTION FROM artgroups WHERE DESCRIPTION='$CArtGroups' AND ARTGROUPSID != $artgroupsID");
	$numrows1 = $query1->RowCount();

	if ($numrows1)
	{
		$smarty->assign("FieldError","$a[entry_exist]");
		UserInput("CArtGroups");
		$smarty->display('artgroups/editf.tpl');
	}
	else
	{
		$query2 = "UPDATE artgroups SET DESCRIPTION='$CArtGroups', MODIFIEDBY='$_SESSION[Username]', MODIFIED='$CurrentDateTime' WHERE ARTGROUPSID=$artgroupsID";

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
