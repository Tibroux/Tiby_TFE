<?php
require_once('config.inc.php');
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}
$user_id = $_SESSION['user'][0]['id'];
	$sql= "DELETE FROM users WHERE id=:id";
	$u= $dbh->prepare($sql);
	$u->bindParam(":id",$user_id);
	$u->execute();
	unset($_SESSION);
	session_destroy();
	header('Location:index.php');
	exit();
?>