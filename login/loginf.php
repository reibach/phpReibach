<?php

/*
	loginf.php

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

if(isset($_POST['Username'])) {
	$Username = htmlspecialchars($_POST['Username'], ENT_QUOTES, $_SESSION['Charset']);
}
if(isset($_POST['Password'])) {
	$Password = htmlspecialchars($_POST['Password'], ENT_QUOTES, $_SESSION['Charset']);
}

// Database connection
//
DBConnect();

$stmt = $db->Prepare("SELECT userid, DECODE(fullname, ?) AS fullname, DECODE(username, ?) AS username, DECODE(password, ?) AS password, DECODE(usergroup1, ?) AS usergroup1, DECODE(usergroup2, ?) AS usergroup2, language, user_active, license_accepted FROM user WHERE DECODE(username, ?) = ? AND DECODE(password, ?) = ? AND user_active = '1'");
$stmt = $db->Execute($stmt, array($pkey, $pkey, $pkey, $pkey, $pkey, $pkey, $Username, $pkey, $Password));
$numrows = $stmt->RowCount();

foreach ($stmt as $f) {
	$UserID = $f['userid'];
	$FullName = $f['fullname'];
	$Usergroup1 = $f['usergroup1'];
	$Usergroup2 = $f['usergroup2'];
	$Language = $f['language'];
	$LicenseAccepted = $f['license_accepted'];
}

if (isset($_SESSION['IPAddress']) || !$numrows) {
	$_SESSION['logoutid'] = "2";

	$stmt1 = $db->Prepare("INSERT INTO syslog (syslogid, created, description, createdby, usergroup1, usergroup2) VALUES(NULL, NOW(), ?,'admin','1','2')");
	$stmt1 = $db->Execute($stmt1, array("Login failed for user $Username from $IPAddress"));

	if ($stmt1 === false) {
		exit(print('<strong>Database Error! Invalid Input!</strong>'));
	}

	exit(header("Location: $web/login/login.php?$sessname=$sessid", TRUE, "302"));
} else {
	$_SESSION['UserID'] = $UserID;
	$_SESSION['Username'] = $Username;
	$_SESSION['Usergroup1'] = $Usergroup1;
	$_SESSION['Usergroup2'] = $Usergroup2;
	$_SESSION['Language'] = $Language;
	$_SESSION['LicenseAccepted'] = $LicenseAccepted;
	$_SESSION['FullName'] = $FullName;
	$_SESSION['IPAddress'] = $IPAddress;
	$_SESSION['LastUserID'] = $UserID;
	$_SESSION['LastUser'] = $Username;
	$_SESSION['LastUsergroup1'] = $Usergroup1;
	$_SESSION['LastUsergroup2'] = $Usergroup2;
	$_SESSION['LastLanguage'] = $Language;
	$_SESSION['LastLicenseAccepted'] = $LicenseAccepted;
	$_SESSION['LastFullName'] = $FullName;
	$_SESSION['LastAccess'] = time();
	
	$stmt2 = $db->Prepare("INSERT INTO syslog (syslogid, created, description, createdby, usergroup1, usergroup2) VALUES(NULL, NOW(), ?,'admin','1','2')");
	$stmt2 = $db->Execute($stmt2, array("Session opened for user $_SESSION[Username] (uid=$_SESSION[UserID]) from $IPAddress"));

	if ($stmt2 === false) {
		exit(print('<strong>Database Error! Invalid Input!</strong>'));
	}

	if ($LicenseAccepted !== "1") {
		exit(header("Location: $web/license.php?$sessname=$sessid", TRUE, "302"));
	} else {
		exit(header("Location: $web/index.php?$sessname=$sessid", TRUE, "302"));
	}
}

DBClose();

?>
