<?php
require_once('config.inc.php');
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}

if($_POST){
	$task_id = htmlspecialchars(strip_tags(trim($_POST['id'])));
	$sql= "DELETE FROM tasks WHERE id=:id";
	$u= $dbh->prepare($sql);
	$u->bindParam(":id",$task_id);
	$u->execute();
}
?>