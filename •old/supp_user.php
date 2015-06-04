<?php
require_once('config.inc.php');
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}
$user_id = strip_tags(trim($_POST['id']));
if ($_POST) {
	$sql= "DELETE FROM users WHERE id=:id";
	$u= $dbh->prepare($sql);
	$u->bindParam(":id",$user_id);
	$u->execute();
}
?>