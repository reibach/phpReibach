<?php

/*
	search.php

	phpRechnung - is easy-to-use Web-based multilingual accounting software.
	Copyright (C) 2001 - 2010 Edy Corak < edy at loenshotel dot de >

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
UserSite();

$smarty->assign("Title","$a[position] - $a[search]");
$smarty->assign("PositionName","$a[pos_name]");
$smarty->assign("PositionText","$a[pos_text]");
$smarty->assign("PositionPrice","$a[pos_price]");

// Database connection
//
DBConnect();

// Get the currency from settings table
//
$smarty->assign("Currency","$CompanyCurrency");

$smarty->display('position/search.tpl');

?>