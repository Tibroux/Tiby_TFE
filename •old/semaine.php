<?php
require_once('config.inc.php');
require_once('trad.inc.php');

/*

$extranet = var_dump(is_dir(link('http://extranet.infographie-sup.be/ics/3TID2.ics')));

if(isset($extranet));

//http://extranet.infographie-sup.be/ics/3TID2.ics       extranet

SELECT * FROM events WHERE date >=CURDATE() AND date <= "2015-05-27 00:00:00"

*/

// vérifier s'il est loggué
//echo '<pre>';
//print_r($_SESSION);
//exit;
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}
// date
$today = "$day $daynum $month $year";
//$today = date('l d F Y');
//$tomorrow = "$dayafterone $daynumafterone $month $year";
//$tomorrow = date('l d F Y', strtotime("+1 day"));
//$twodays = "$dayaftertwo $daynumaftertwo $month $year";
//$twodays = date('l d F Y', strtotime("+2 days"));
//$threedays = "$dayafterthree $daynumafterthree $month $year";
//$threedays = date('l d F Y', strtotime("+3 days"));
//$fourdays = "$dayafterfour $daynumafterfour $month $year";
//$fourdays = date('l d F Y', strtotime("+4 days"));
//$fivedays = "$dayafterfive $daynumafterfive $month $year";
//$fivedays = date('l d F Y', strtotime("+5 days"));
//$sixdays = "$dayaftersix $daynumaftersix $month $year";
//$sixdays = date('l d F Y', strtotime("+6 days"));
//$sevendays = "$dayafterseven $daynumafterseven $month $year";
//$sevendays = date('l d F Y', strtotime("+7 days"));
// nom d'utilisateur
$name= "SELECT * FROM users WHERE id=:id;";
$u=$dbh->prepare($name);
$u->bindParam(":id",$_SESSION['user'][0]['id']);
$u->execute();
$usernamedb=$u->fetchAll(PDO::FETCH_ASSOC);
// la semaine de l'utilisateur dans la DB
//var_dump($_SESSION);
//var_dump($usernamedb);
$sql= "SELECT tasks.id,tasks.checked,tasks.datetask,tasks.task,tasks.user_id FROM tasks LEFT JOIN users ON users.id= tasks.user_id WHERE user_id = :tadaa";
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
    <meta charset="UTF-8"/>
    <title>Semaine</title>
    <meta name="author" content="Tiby Voesters"/>
    <meta name="description" content="La web-application Yeti, Pour vous aider à organiser vos journées."/>
    <meta name="keywords" content="tiby,voesters,web-app,dwm,production,mobile,organisation,étudiant,étudiants,beta,tfe"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <link rel="icon" href="img/icon_app.png"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!--<meta name="apple-mobile-web-app-status-bar-style" content="white"/>-->
    <meta name="apple-mobile-web-app-title" content="Yeti"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,minimal-ui">
    <link rel="apple-touch-icon-precomposed" href="img/icon_app.png"/>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/magie.js"></script>
</head>
<body>
	<div id="semaine" class="container">
		<header class="phone">
			<ul class="exception">
				<li class="back"></li>
				<li><h1 class="space">YETI</h1></li>
				<li class="parameter"><a href="reglages.php"><img src="img/param_icon.png" alt="paramètres"></a></li>
			</ul>
			<ul class="closer">
				<li class="harvey">
					<ul>
						<li class="icon_search"><button><img class="search_logo" src="img/search_blueicon.png" alt="search_logo"/></button></li>
						<li class="adder"><a href="#">+</a></li>
					</ul>
				</li>
				<li class="searching">
					<ul>
						<li class="section_search">
						<img class="search_logo" src="img/search_icon.png" alt="search_logo"/>
						<input id="search" name="search" type="search" placeholder="Rechercher"/>
						</li>
					</ul>
				</li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
			<ul class="active_day">
				<li>
					<h3 class="date"><?php echo $today; ?><span>(Aujourd'hui)</span></h3>
				</li>
				<li>
					<ul class="planning">
						<li class="wafel">
							<ul>
								<li class="clock">08:10</li>
								<li>
									<ul class="event">
										<li class="rdv">Aller au Starbucks</li>
										<li class="localisation">Gare</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="wafel">
							<ul>
								<li class="clock">10:40</li>
								<li>
									<ul class="event">
										<li class="rdv">TP Bourgaux</li>
										<li class="localisation">C214</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<div class="todo">
						<h3>Vos tâches<span class="compteur">(<?php echo '6' ?>)</span></h3>
						<ul>
						<?php
						foreach ($tasks as $keys=>$t){
	?>
						
							<li><input name="shaker" type="checkbox"/><label class="todo_right" name="shaker" for="shaker"><!--<span class="time"><?php //echo date('H:i', strtotime($t['hour'])); ?></span>--><?php echo $t['task']; ?></label><button class="supp" data-id="<?php echo $t['id']; ?>">-</button></li>
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
			<!--<ul class="back_to_the_future">
				<li>
					<h3 class="date"><?php //echo $tomorrow; ?></h3>
				</li>
				<li class="disappear">
					<table class="planning">
					</table>
				</li>
				<li>
				<div class="todo">
					<h3>Tâches du jour :</h3>
						<ul class="future_adjust">
							<li><input name="futfut" type="checkbox"/><label class="todo_right" name="futfut" for="futfut">Boire du café</label><button class="supp">-</button></li>
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
					<h3 class="date"><?php //echo $twodays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>09:30</td>
							<td>Courbatures</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
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
					<h3 class="date"><?php //echo $threedays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>15:30</td>
							<td>Mortal Kombat</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
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
					<h3 class="date"><?php //echo $fourdays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>15:30</td>
							<td>Mortal Kombat</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
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
					<h3 class="date"><?php //echo $fivedays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>15:30</td>
							<td>Destiny</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
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
					<h3 class="date"><?php //echo $sixdays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>17:30</td>
							<td>Destiny</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
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
					<h3 class="date"><?php //echo $sevendays; ?></h3>
				</li>
				<li>
					<table class="planning">
						<tr>
							<td>21:30</td>
							<td>Sims</td>
							<td class="tab_right">Domicile</td>
						</tr>
					</table>
				</li>
				<li>
					<div class="todo">
						<h3>Tâches du jour :</h3>
						<ul>
						</ul>
						<form class="more">
							<ul>
								<li><input class="add" type="text" placeholder="Ajouter une tâche..."/><input class="ok" type="submit" value="OK"/></li>
							</ul>
						</form>
					</div>
				</li>
			</ul>-->
			</div>
		</div>
	</div>
</body>
</html>