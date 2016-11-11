<?php

/*
	suend.php

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

CheckUser();
CheckSession();

if(isset($_SESSION['SuperUser']) && $_SESSION['SuperUser'] === $root) {
	Logout();
	$_SESSION['UserID'] = $_SESSION['LastUserID'];
	$_SESSION['Username'] = $_SESSION['LastUser'];
	$_SESSION['FullName'] = $_SESSION['LastFullName'];
	$_SESSION['Language'] = $_SESSION['LastLanguage'];
	$_SESSION['LicenseAccepted'] = $_SESSION['LastLicenseAccepted'];
	$_SESSION['Usergroup1'] = $_SESSION['LastUsergroup1'];
	$_SESSION['Usergroup2'] = $_SESSION['LastUsergroup2'];

	unset ($_SESSION['SuperUser']);

	if(isset($_SESSION['LastUserSite'])) {
		exit(header("Location: $_SESSION[LastUserSite]", TRUE, "302"));
	} else {
		exit(header("Location: $web/index.php?$sessname=$sessid", TRUE, "302"));
	}
}

?>
