<?php

require_once("../include/phprechnung.inc.php");
require_once("../include/smarty.inc.php");

CheckUser();
CheckSession();
UserSite();

$smarty->assign("Title","$a[article] - $a[art_groups] - $a[help]");
$smarty->assign("Helpfile","$_SESSION[Help]/artgroups.tpl");

$smarty->display('artgroups/help.tpl');

?>
