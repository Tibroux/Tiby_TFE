<?php
require_once('config.inc.php');
$task = strip_tags(trim($_POST['add']));
$datetask = strip_tags(trim($_POST['datetask']));
$checked = 0;
$user_id = $_SESSION['user'][0]['id'];
if ($_POST) {
	if ($task != NULL) {
		$query = "INSERT INTO tasks(checked,datetask,task,user_id) VALUES(:checked,:datetask,:task,:user_id);";
		$prout = $dbh->prepare($query);
		$prout -> bindParam(":checked",$checked);
		$prout -> bindParam(":datetask",$datetask);
		$prout -> bindParam(":task",$task);
		$prout -> bindParam(":user_id",$user_id);
		$prout -> execute();
		header('Location: semaine.php');
	}
}
?>