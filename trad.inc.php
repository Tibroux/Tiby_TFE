<?php

$daybefore = date("l", strtotime("-1 day"));
$day = date("l");
$dayafterone = date("l", strtotime("+1 day"));
$dayaftertwo = date("l", strtotime("+2 day"));
$dayafterthree = date("l", strtotime("+3 day"));
$dayafterfour = date("l", strtotime("+4 day"));
$dayafterfive = date("l", strtotime("+5 day"));
$dayaftersix = date("l", strtotime("+6 day"));
$dayafterseven = date("l", strtotime("+7 day"));
$daynumbefore = date("d", strtotime("-1 day"));
$daynum = date("d");
$daynumafterone = date("d", strtotime("+1 day"));
$daynumaftertwo = date("d", strtotime("+2 days"));
$daynumafterthree = date("d", strtotime("+3 days"));
$daynumafterfour = date("d", strtotime("+4 days"));
$daynumafterfive = date("d", strtotime("+5 days"));
$daynumaftersix = date("d", strtotime("+6 days"));
$daynumafterseven = date("d", strtotime("+7 days"));
$month = date("F");
$year = date("Y");

switch($daybefore) {
	case "Monday":    $daybefore = "Lundi";  break;
	case "Tuesday":   $daybefore = "Mardi"; break;
	case "Wednesday": $daybefore = "Mercredi";  break;
	case "Thursday":  $daybefore = "Jeudi"; break;
	case "Friday":    $daybefore = "Vendredi";  break;
	case "Saturday":  $daybefore = "Samedi";  break;
	case "Sunday":    $daybefore = "Dimanche";  break;
	default:          $daybefore = "erreur"; break;
}
switch($day) {
	case "Monday":    $day = "Lundi";  break;
	case "Tuesday":   $day = "Mardi"; break;
	case "Wednesday": $day = "Mercredi";  break;
	case "Thursday":  $day = "Jeudi"; break;
	case "Friday":    $day = "Vendredi";  break;
	case "Saturday":  $day = "Samedi";  break;
	case "Sunday":    $day = "Dimanche";  break;
	default:          $day = "erreur"; break;
}
switch($dayafterone) {
	case "Monday":    $dayafterone = "Lundi";  break;
	case "Tuesday":   $dayafterone = "Mardi"; break;
	case "Wednesday": $dayafterone = "Mercredi";  break;
	case "Thursday":  $dayafterone = "Jeudi"; break;
	case "Friday":    $dayafterone = "Vendredi";  break;
	case "Saturday":  $dayafterone = "Samedi";  break;
	case "Sunday":    $dayafterone = "Dimanche";  break;
	default:          $dayafterone = "erreur"; break;
}
switch($dayaftertwo) {
	case "Monday":    $dayaftertwo = "Lundi";  break;
	case "Tuesday":   $dayaftertwo = "Mardi"; break;
	case "Wednesday": $dayaftertwo = "Mercredi";  break;
	case "Thursday":  $dayaftertwo = "Jeudi"; break;
	case "Friday":    $dayaftertwo = "Vendredi";  break;
	case "Saturday":  $dayaftertwo = "Samedi";  break;
	case "Sunday":    $dayaftertwo = "Dimanche";  break;
	default:          $dayaftertwo = "erreur"; break;
}
switch($dayafterthree) {
	case "Monday":    $dayafterthree = "Lundi";  break;
	case "Tuesday":   $dayafterthree = "Mardi"; break;
	case "Wednesday": $dayafterthree = "Mercredi";  break;
	case "Thursday":  $dayafterthree = "Jeudi"; break;
	case "Friday":    $dayafterthree = "Vendredi";  break;
	case "Saturday":  $dayafterthree = "Samedi";  break;
	case "Sunday":    $dayafterthree = "Dimanche";  break;
	default:          $dayafterthree = "erreur"; break;
}
switch($dayafterfour) {
	case "Monday":    $dayafterfour = "Lundi";  break;
	case "Tuesday":   $dayafterfour = "Mardi"; break;
	case "Wednesday": $dayafterfour = "Mercredi";  break;
	case "Thursday":  $dayafterfour = "Jeudi"; break;
	case "Friday":    $dayafterfour = "Vendredi";  break;
	case "Saturday":  $dayafterfour = "Samedi";  break;
	case "Sunday":    $dayafterfour = "Dimanche";  break;
	default:          $dayafterfour = "erreur"; break;
}
switch($dayafterfive) {
	case "Monday":    $dayafterfive = "Lundi";  break;
	case "Tuesday":   $dayafterfive = "Mardi"; break;
	case "Wednesday": $dayafterfive = "Mercredi";  break;
	case "Thursday":  $dayafterfive = "Jeudi"; break;
	case "Friday":    $dayafterfive = "Vendredi";  break;
	case "Saturday":  $dayafterfive = "Samedi";  break;
	case "Sunday":    $dayafterfive = "Dimanche";  break;
	default:          $dayafterfive = "erreur"; break;
}
switch($dayaftersix) {
	case "Monday":    $dayaftersix = "Lundi";  break;
	case "Tuesday":   $dayaftersix = "Mardi"; break;
	case "Wednesday": $dayaftersix = "Mercredi";  break;
	case "Thursday":  $dayaftersix = "Jeudi"; break;
	case "Friday":    $dayaftersix = "Vendredi";  break;
	case "Saturday":  $dayaftersix = "Samedi";  break;
	case "Sunday":    $dayaftersix = "Dimanche";  break;
	default:          $dayaftersix = "erreur"; break;
}
switch($dayafterseven) {
	case "Monday":    $dayafterseven = "Lundi";  break;
	case "Tuesday":   $dayafterseven = "Mardi"; break;
	case "Wednesday": $dayafterseven = "Mercredi";  break;
	case "Thursday":  $dayafterseven = "Jeudi"; break;
	case "Friday":    $dayafterseven = "Vendredi";  break;
	case "Saturday":  $dayafterseven = "Samedi";  break;
	case "Sunday":    $dayafterseven = "Dimanche";  break;
	default:          $dayafterseven = "erreur"; break;
}

switch($month) {
	case "January":   $month = "Janvier";    break;
	case "February":  $month = "Février";   break;
	case "March":     $month = "Mars";     break;
	case "April":     $month = "Avril";     break;
	case "May":       $month = "Mai";       break;
	case "June":      $month = "Juin";      break;
	case "July":      $month = "Juillet";      break;
	case "August":    $month = "Août";    break;
	case "September": $month = "Septembre"; break;
	case "October":   $month = "Octobre";   break;
	case "November":  $month = "Novembre";  break;
	case "December":  $month = "Decembre";  break;
	default:          $month = "erreur";   break;
}

?>