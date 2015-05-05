<?php
require_once('config.inc.php');
$task = strip_tags(trim($_POST['add']));
$check = 0;
$user_id = $_SESSION['user'][0]['id'];
if ($_POST) {
	if ($task != NULL) {
		$query = "INSERT INTO tasks(checked,task,user_id) VALUES(:check,:task,:user_id);";
		$prout = $dbh->prepare($query);
		$prout -> bindParam(":check",$check);
		$prout -> bindParam(":task",$task);
		$prout -> bindParam(":user_id",$user_id);
		$prout -> execute();
		header('Location: semaine.php');
	}
}
?>