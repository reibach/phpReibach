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

$smarty->assign("Title","$a[article] - $a[art_groups] - $a[new]");
$smarty->assign("NewEntry","$a[new_entry]");

// Database connection
//
DBConnect();

$query3 = $db->GetRow("SELECT MAX(ARTGROUPSID) AS MAX_ARTGROUPSID FROM artgroups");
if (!$query3)
	print($db->ErrorMsg());
else
	$ArtGroupsID = $query3['MAX_ARTGROUPSID'];

	$smarty->assign("ArtGroupsID",$ArtGroupsID);

$smarty->display('artgroups/new.tpl');

unset($_SESSION['NewID']);

?>
