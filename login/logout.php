<?php

/*
	logout.php

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

// Database connection
//
DBConnect();
	
$stmt = $db->Prepare("INSERT INTO syslog (syslogid, created, description, createdby, usergroup1, usergroup2) VALUES(NULL, NOW(), ?,'admin','1','2')");
$stmt = $db->Execute($stmt, array("Session closed for user $_SESSION[Username] (uid=$_SESSION[UserID])"));

if ($stmt === false) {
	exit(print('<strong>Database Error! Invalid Input!</strong>'));
}

Logout();
@session_destroy();
@session_start();
$_SESSION['logoutid'] = "1";

exit(header("Location: $web/login/login.php?$sessname=$sessid", TRUE, "302"));

DBClose();

?>
