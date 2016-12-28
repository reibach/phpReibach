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

function UserInput($mark)
{
	global $smarty;

	$smarty->assign("mark",$mark);
}

if (empty($CArtGroups))
{
	$smarty->assign("FieldError","$a[article] - $a[art_groups] - $a[field_error]");
	UserInput("CArtGroups");
	$smarty->display('artgroups/newf.tpl');
}
else
{
	// Database connection
	//
	DBConnect();	
	$query1 = $db->Execute("SELECT DESCRIPTION FROM artgroups WHERE DESCRIPTION='$CArtGroups'");
	$numrows1 = $query1->RowCount();

	if ($numrows1)
	{
		$smarty->assign("FieldError","$a[entry_exist]");
		UserInput("CArtGroups");
		$smarty->display('artgroups/newf.tpl');
	}
	else
	{
		$query2 = "INSERT INTO artgroups (ARTGROUPSID, DESCRIPTION, CREATEDBY, MODIFIEDBY, USERGROUP1, USERGROUP2, CREATED, MODIFIED)";
		$query2 .= "VALUES(NULL, '$CArtGroups', '$_SESSION[Username]', '$_SESSION[Username]', '$_SESSION[Usergroup1]', '$_SESSION[Usergroup2]', '$CurrentDateTime', '$CurrentDateTime')";

		if ($db->Execute($query2) === false)
		{
			die($db->ErrorMsg());
		}

		$_SESSION['NewID'] = "1";

		Header("Location: $web/artgroups/new.php?artgroupsID=$artgroupsID&page=$page&Description_1=$Description_1&Order=$Order&Sort=$Sort&$sessname=$sessid");
	}
}

?>
