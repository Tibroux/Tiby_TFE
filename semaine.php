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
$name= "SELECT * FROM users WHERE id=:id;";
$u=$dbh->prepare($name);
$u->bindParam(":id",$_SESSION['user'][0]['id']);
$u->execute();
$usernamedb=$u->fetchAll(PDO::FETCH_ASSOC);
// la semaine de l'utilisateur dans la DB
//var_dump($_SESSION);
//var_dump($usernamedb);
$sql= "SELECT tasks.id,tasks.checked,tasks.task,tasks.user_id FROM tasks LEFT JOIN users ON users.id= tasks.user_id WHERE user_id = :tadaa";
//echo $sql;

$q =  $dbh ->prepare($sql);
$q -> bindParam(":tadaa",$_SESSION['user'][0]['id']);
$q -> execute();
$tasks = $q->fetchAll(PDO::FETCH_ASSOC);
//var_dump($tasks);
//foreach ($tasks as $keys->$t) {
	//var_dump($tasks); // Montrer les tâches

/*while ($tasks as $task => $value) {
	//echo $task; // Montrer les tâches
}*/
/*echo '<pre>';
print_r($tasks);
exit;*/
?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Semaine</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/magie.js"></script>
</head>
<body>
	<div id="semaine" class="container">
		<header class="phone">
			<ul class="exception">
				<li class="back"><a href="mois.php">Mars</a></li>
				<li><h1 class="space"><a class="user" href="reglages.php"><?php echo $usernamedb[0]['username'] ?></a></h1></li>
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
					<h3 class="date">Lundi 4 mai 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
			</ul>
			<ul class="past_day">
				<li>
					<h3 class="date">Mardi 5 mai 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
			</ul>
			<ul class="past_day">
				<li>
					<h3 class="date">Mercredi 6 mai 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
			</ul>
			<ul class="active_day">
				<li>
					<h3 class="date">Jeudi 7 mai 2015</h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td class="tab_left">08:10</td>
							<td class="double_line">Aller au Starbucks<br/><span class="prof"></span></td>
							<td class="tab_right">Gare</td>
						</tr>
						<tr>
							<td class="tab_left_split"></td>
							<td class="tab_split"></td>
							<td class="tab_right_split"></td>
						</tr>
						<tr>
							<td class="tab_left">9:15</td>
							<td class="double_line">Présentation Bêta<br/><span class="prof">3 Pokémons</span></td>
							<td class="tab_right">A79</td>
						</tr>
						<tr>
							<td class="tab_left_split"></td>
							<td class="tab_split"></td>
							<td class="tab_right_split"></td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<ul>
						<?php
						foreach ($tasks as $keys=>$t){
	?>
						
							<li><input name="shaker" type="checkbox"/><label class="todo_right" name="shaker" for="shaker"><?php echo $t['task']; ?></label><button data-id="<?php echo $t['id']; ?>">-</button></li>
							<?php } ?>
						</ul>
						<form class="more" method="post" action="post_task.php">
							<ul>
								<li><input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/><input class="ok" type="submit" value="OK"/></li>
							</ul>
						</form>
					</div>
				</li>
			</ul>
			<ul class="back_to_the_future">
				<li>
					<h3 class="date">Vendredi 8 mai 2015</h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
				<li>
				<div class="todo">
						<ul class="future_adjust">
							<li><input name="futfut" type="checkbox"/><label class="todo_right" name="futfut" for="futfut">JPO</label><button>-</button></li>
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
					<h3 class="date">Samedi 9 mai 2015</h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>10:00</td>
							<td>Gueule de bois</td>
							<td class="tab_right">Vomi</td>
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
			<ul class="back_to_the_future">
				<li>
					<h3 class="date">Dimanche 10 mai 2015</h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>13:30</td>
							<td>Mortal Kombat</td>
							<td class="tab_right">Scorpion</td>
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