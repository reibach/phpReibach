<?php

/*
	posdeletef.php

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

$ArrayValue = CheckArrayValue($_REQUEST);

foreach($ArrayValue as $key => $val)
{
	$$key = $val;
}

if(!is_numeric($tmpPosID) || $tmpPosID <= 0 )
{
	die(header("Location: $web"));
}

if(isset($infoID) && $infoID == '9')
{
	$Searchstring = "&OfferID1=$OfferID1&CustomerID1=$CustomerID1&DateFrom1=$DateFrom1&DateTill1=$DateTill1&Total1=$Total1&Customer1=$Customer1";
}
else
{
	$Searchstring = "";
}

// Database connection
//
DBConnect();

$db->Execute("DELETE FROM tmp_offer WHERE TMP_OFFERID=$tmpPosID");

if(!empty($offerID))
{
	Header("Location: $web/offer/edit.php?page=$page&myID=$myID&offerID=$offerID&infoID=$infoID&messageID=$messageID&OfferDate=$OfferDate&OfferStatus=$OfferStatus&MethodOfPayment=$MethodOfPayment&MethodOfPaymentDate=$MethodOfPaymentDate&Note=$Note&Canceled=$Canceled&tmpID=1&Order=$Order&Sort=$Sort$Searchstring&$sessname=$sessid");
}
else
{
	Header("Location: $web/offer/new.php?$Requestedstring&tmpID=1&$sessname=$sessid");
}

?>
