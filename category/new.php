<?php

/*
	new.php

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

$smarty->assign("Title","$a[category] - $a[new]");
$smarty->assign("NewEntry","$a[new_entry]");

// Database connection
//
DBConnect();

$query3 = $db->GetRow("SELECT MAX(CATEGORYID) AS MAX_CATEGORYID FROM category");
if (!$query3)
	print($db->ErrorMsg());
else
	$CategoryID = $query3['MAX_CATEGORYID'];

	$smarty->assign("CategoryID",$CategoryID);

$smarty->display('category/new.tpl');

unset($_SESSION['NewID']);

?>
