<?php
require_once('config.inc.php');
$task = strip_tags(trim($_POST['add']));
$hour = strip_tags(trim($_POST['hour']));
$checked = 0;
$user_id = $_SESSION['user'][0]['id'];
if ($_POST) {
	if ($task != NULL) {
		$query = "INSERT INTO tasks(checked,hour,task,user_id) VALUES(:checked,:hour,:task,:user_id);";
		$prout = $dbh->prepare($query);
		$prout -> bindParam(":checked",$checked);
		$prout -> bindParam(":hour",$hour);
		$prout -> bindParam(":task",$task);
		$prout -> bindParam(":user_id",$user_id);
		$prout -> execute();
		header('Location: semaine.php');
	}
}
?>