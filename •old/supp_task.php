<?php
require_once('config.inc.php');
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}
$task_id = strip_tags(trim($_POST['id']));
if ($_POST) {
	$sql= "DELETE FROM tasks WHERE id=:id";
	$u= $dbh->prepare($sql);
	$u->bindParam(":id",$task_id);
	$u->execute();
}
?>