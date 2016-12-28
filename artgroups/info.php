<?php
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

if(!is_numeric($artgroupsID) || $artgroupsID <= 0 )
{
	die(header("Location: $web"));
}

$smarty->assign("Title","$a[article] - $a[art_groups] - $a[info]");

// Database connection
//
DBConnect();

// Get entrys from artgroups table
//
$query = $db->Execute("SELECT ARTGROUPSID, DESCRIPTION FROM artgroups WHERE ARTGROUPSID=$artgroupsID");

// If an error has occurred, display the error message
//
if (!$query)
	print($db->ErrorMsg());
else
	foreach($query as $f)
	{
		$smarty->assign("ARTGROUPS",$f['DESCRIPTION']);
	}

$smarty->display('artgroups/info.tpl');

?>
