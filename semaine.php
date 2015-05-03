<?php
require_once('config.inc.php');

// vérifier s'il est loggué
//echo '<pre>';
//print_r($_SESSION);
//exit;
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}

// nom d'utilisateur
$name= "SELECT * FROM users LEFT JOIN tasks ON users.id= tasks.user_id WHERE user_id = '".$_SESSION['user'][0]['id']."'";

// la semaine de l'utilisateur dans la DB

$sql= "SELECT * FROM tasks LEFT JOIN users ON users.id= tasks.user_id WHERE user_id = '".$_SESSION['user'][0]['id']."'";
//echo $sql;

$q =  $dbh ->query($sql);
$tasks = $q->fetch(PDO::FETCH_ASSOC);
foreach ($tasks as $task => $value) {
	//echo $task; // Montrer les tâches
}
/*echo '<pre>';
print_r($tasks);
exit;*/
?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Semaine</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>
<body>
	<div id="semaine" class="container">
		<header class="phone">
			<ul class="exception">
				<li class="back"><a href="mois.php">Mars</a></li>
				<li><h1 class="space"><a class="user" href="reglages.php"><?php echo utf8_decode($users['username']) ?></a></h1></li>
				<li class="more"><a href="#">+</a></li>
			</ul>
			<ul class="champs">
				<li class="section_search">
				<img class="search_logo" src="#" alt="search_logo"/>
				<input id="search" name="search" type="text" placeholder="Rechercher"/>
				</li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
				<ul class="past_day">
				<li>
					<h3 class="date">Lundi 16 mars 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
			</ul>
			<ul class="past_day">
				<li>
					<h3 class="date">Mardi 17 mars 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
			</ul>
			<ul class="active_day">
				<li>
					<h3 class="date">Mercredi 18 mars 2015</h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td class="tab_left">17:10</td>
							<td class="double_line">Responsabilités & Grand pouvoir<br/><span class="prof">Oncle Ben</span></td>
							<td class="tab_right">Parking B4</td>
						</tr>
						<tr>
							<td class="tab_left_split">17:20</td>
							<td class="tab_split"></td>
							<td class="tab_right_split"></td>
						</tr>
						<tr>
							<td class="tab_left">18:30</td>
							<td class="double_line">Triste nouvelle<br/><span class="prof">Tante May</span></td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<ul>
							<li><input name="shaker" type="checkbox"/><label class="todo_right" name="shaker" for="shaker"><?php echo utf8_decode($tasks['task'][0]) ?></label></li>
							<li><input name="shaker" type="checkbox"/><label class="todo_right" name="shaker" for="shaker"><?php echo utf8_decode($tasks['task'][1]) ?></label></li>
							<li><input type="checkbox"/><input class="todo_right" type="text" value="Aller à la bibliothèque"/></li>
							<li><input type="checkbox"/><input class="todo_right" type="text" value="Rentre à pied"/></li>
							<li><input type="checkbox"/><input class="todo_right" type="text" value="Croiser Oncle Ben"/></li>
							<li><input type="checkbox"/><input class="todo_right" type="text" value="Parler à Tante May"/></li>
						</ul>
						<form class="more">
							<ul>
								<li><input class="add" type="text" placeholder="Ajouter une tâche..."/><input class="ok" type="submit" value="OK"/></li>
							</ul>
						</form>
					</div>
				</li>
			</ul>
			<ul class="back_to_the_future">
				<li>
					<h3 class="date">Jeudi 19 mars 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
				<li>
				<div class="todo">
						<ul class="future_adjust">
							<li><input type="checkbox"/><input class="todo_right" type="text" value="Préparer les funérailles"/></li>
						</ul>
						<form class="more">
							<ul>
								<li><input class="add" type="text" placeholder="Ajouter une tâche..."/><input class="ok" type="submit" value="OK"/></li>
							</ul>
						</form>
					</div>
				</li>
			</ul>
			<ul class="back_to_the_future">
				<li>
					<h3 class="date">Vendredi 20 mars 2015</h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>10:00</td>
							<td>Enterrement</td>
							<td class="tab_right">Cimetière</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<ul>
						</ul>
						<form class="more">
							<ul>
								<li><input class="add" type="text" placeholder="Ajouter une tâche..."/><input class="ok" type="submit" value="OK"/></li>
							</ul>
						</form>
					</div>
				</li>
			</ul>
			</div>
		</div>
	</div>
</body>
</html>