<?php

//include('http://extranet.infographie-sup.be/ics/3TID2.ics');
/*
include('3TID2-2014-01.ics');
$extranet = new extranet('3TID2-2014-01.ics');
print_r($extranet->get_event_array());
*/

require_once('config.inc.php');

$icsUrl = '3TID2-2014-01.ics';

function icsToArray($icsUrl) {
	$icsFileExtranet = file_get_contents($icsUrl);
	$icsDataExtranet = explode("BEGIN:", $icsFileExtranet);
	
	foreach($icsDataExtranet as $key => $value) {
		$icsDatesMetaExtranet[$key] = explode("\n", $value);
	}
	
	foreach($icsDatesMetaExtranet as $key => $value) {
		foreach($value as $subKey => $subValue) {
			if ($subValue != "") {
				if ($key != 0 && $subKey == 0) {
					$icsDatesExtranet[$key]["BEGIN"] = $subValue;
				} else {
					$subValueArr = explode(":", $subValue, 2);
					$icsDatesExtranet[$key][$subValueArr[0]] = $subValueArr[1];
				}
			}
		}
	}
	
	return $icsDatesExtranet;
}

$ics = icsToArray($icsUrl);

foreach ($ics as $event) {
	$sql ="SELECT UID FROM events WHERE UID= ?";
	
	// execute la requête
			$sth = $dbh->prepare($sql);
			$sth->execute(array($event['UID']));
			$dbevent = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	if ($dbevent['UID'] == false) {
		$sql = "INSERT INTO EVENTS SET UID='".$event['UID']."', from='".$event['DTSTART;TZID=Europe/Brussels']."', to='".$event['DTEND;TZID=Europe/Brussels']."', event='".$event['SUMMARY']."', location='".$event['LOCATION']."'";
	} else {
		$sql = "UPDATE INTO EVENTS SET UID='S32_00be227f1badc63c4d1c49881abe3ada9f353f87ead88fb1aa3966f226@infogra
 phie-sup.be' WHERE UID='".$event['UID']."', from='".$event['DTSTART;TZID=Europe/Brussels']."', to='".$event['DTEND;TZID=Europe/Brussels']."', event='".$event['SUMMARY']."', location='".$event['LOCATION']."'";
	}
	echo "$sql <br>";
}

//echo '<pre>';
//print_r(icsToArray($icsUrl));