<?php

//include('http://extranet.infographie-sup.be/ics/3TID2.ics');
/*
include('3TID2-2014-01.ics');
$extranet = new extranet('3TID2-2014-01.ics');
print_r($extranet->get_event_array());
*/

require_once('config.inc.php');

function is_valid_url($url) {
	return filter_var($url, FILTER_VALIDATE_URL);
}

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

function send_ics_to_db($icsUrl, $dbh)
{
	$ics = icsToArray($icsUrl);

	foreach ($ics as $event) {
		if($event['SUMMARY'] != NULL && $event['LOCATION'] != NULL)
		{
			$request ="SELECT events.uid FROM events WHERE events.uid= :eventUID";
			// execute la requête
					$statement = $dbh->prepare($request);
					$statement->bindParam(":eventUID",$event['UID']);
					$statement->execute();
					$dbevent = $statement->fetchAll(PDO::FETCH_ASSOC);
			if ($dbevent[0]['uid'] == NULL) {
				$sql = "INSERT INTO events(events.uid, events.from, events.to, events.event, events.location, events.user) VALUES(:eventUID, :eventFrom, :eventTo, :event, :eventLocation, :userID)";
			} else {
				$sql = "UPDATE events SET events.uid =:eventUID, events.from=:eventFrom, events.to=:eventTo, events.event=:event, events.location=:eventLocation, events.user=:userID WHERE UID=:eventUID";
			}
			$date_start = explode("T", $event['DTSTART;TZID=Europe/Brussels'], 2);
			$date_start = $date_start[0];
			$time_start = substr($event['DTSTART;TZID=Europe/Brussels'], strpos($event['DTSTART;TZID=Europe/Brussels'], "T") + 1);
			$year_start = substr($date_start, 0, 4);
			$month_start = substr($date_start, 4, 2);
			$day_start = substr($date_start, 6, 8);
			$hour_start = substr($time_start, 0, 2);
			$minutes_start = substr($time_start, 2, 2);
			$seconds_start = substr($time_start, 4, 6);
			$datetime_start = $year_start."-".$month_start."-".$day_start." ".$hour_start.":".$minutes_start.":".$seconds_start;
			
			$date_end = explode("T", $event['DTEND;TZID=Europe/Brussels'], 2);
			$date_end = $date_end[0];
			$time_end = substr($event['DTEND;TZID=Europe/Brussels'], strpos($event['DTEND;TZID=Europe/Brussels'], "T") + 1);
			$year_end = substr($date_end, 0, 4);
			$month_end = substr($date_end, 4, 2);
			$day_end = substr($date_end, 6, 8);
			$hour_end = substr($time_end, 0, 2);
			$minutes_end = substr($time_end, 2, 2);
			$seconds_end = substr($time_end, 4, 6);
			$datetime_end = $year_end."-".$month_end."-".$day_end." ".$hour_end.":".$minutes_end.":".$seconds_end;
			/*echo "$sql <br>";*/
			$preparedStatement = $dbh->prepare($sql);
			$preparedStatement->bindParam(":eventUID",$event['UID']);
			$preparedStatement->bindParam(":eventFrom",$datetime_start);
			$preparedStatement->bindParam(":eventTo",$datetime_end);
			$preparedStatement->bindParam(":event",$event['SUMMARY']);
			$preparedStatement->bindParam(":eventLocation",$event['LOCATION']);
			$preparedStatement->bindParam(":userID",$_SESSION['user'][0]['id']);
			$preparedStatement->execute();
		}
	}
}

/*Call and launch functions*/
$sql= "SELECT * FROM users WHERE id = :userID";
$q =  $dbh ->prepare($sql);
$q -> bindParam(":userID",$_SESSION['user'][0]['id']);
$q -> execute();
$get_ics = $q->fetchAll(PDO::FETCH_ASSOC);

if(strlen($get_ics[0]['ical'])>0)
{
	if(is_valid_url($get_ics[0]['ical']))
	{
		send_ics_to_db($get_ics[0]['ical'], $dbh);
		echo "<p>ICS iCal : Synchronisé</p>";
	}
	else
	{
		echo "<p>ICS iCal : Erreur, veillez vérifier l'url dans la page réglages</p>";
	}
}
else
{
	echo "<p>Aucun ICS iCal</p>";
}

if(strlen($get_ics[0]['googlecal'])>0)
{
	if(is_valid_url($get_ics[0]['googlecal']))
	{
		send_ics_to_db($get_ics[0]['googlecal'], $dbh);
		echo "<p>ICS Google Cal : Synchronisé</p>";
	}
	else
	{
		echo "<p>ICS Google Cal : Erreur, veillez vérifier l'url dans la page réglages</p>";
	}
}
else
{
	echo "<p>Aucun ICS Google Cal</p>";
}

if(strlen($get_ics[0]['other'])>0)
{
	if(is_valid_url($get_ics[0]['other']))
	{
		send_ics_to_db($get_ics[0]['other'], $dbh);
		echo "<p>ICS Autre : Synchronisé</p>";
	}
	else
	{
		echo "<p>ICS Autre : Erreur, veillez vérifier l'url dans la page réglages</p>";
	}
}
else
{
	echo "<p>Aucun ICS Autre</p>";
}

header("refresh:2;url=reglages.php");

//echo '<pre>';
//print_r(icsToArray($icsUrl));