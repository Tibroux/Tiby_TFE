<?php
require_once('config.inc.php');
$task = strip_tags(trim($_POST['add']));
$timetask = '23:59:59';
$datetask = strip_tags(trim($_POST['datetask']));
$date_sql = $datetask.' '.$timetask;
$checked = 0;
$user_id = $_SESSION['user'][0]['id'];
if ($_POST) {
	if ($task != NULL) {
		$query = "INSERT INTO tasks(checked,datetask,task,user_id) VALUES(:checked,:date_sql,:task,:user_id);";
		$prout = $dbh->prepare($query);
		$prout -> bindParam(":checked",$checked);
		$prout -> bindParam(":date_sql",$date_sql);
		$prout -> bindParam(":task",$task);
		$prout -> bindParam(":user_id",$user_id);
		$prout -> execute();
		header('Location: semaine.php');
	}
}
?>