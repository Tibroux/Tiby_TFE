<?php
require_once('config.inc.php');
/* require_once('trad.inc.php'); */
require_once('function_trad_inc.php');
require_once('get_task.php');


// vérifier s'il est loggué
if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}
// date
//$today = "$day $daynum $month $year";
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

/*$q =  $dbh ->prepare($sql);
$q -> bindParam(":tadaa",$_SESSION['user'][0]['id']);
$q -> execute();
$tasks = $q->fetchAll(PDO::FETCH_ASSOC);*/
//var_dump($tasks);
//foreach ($tasks as $keys->$t) {
	//var_dump($tasks); // Montrer les tâches

/*while ($tasks as $task => $value) {
	//echo $task; // Montrer les tâches
}*/
/*echo '<pre>';
print_r($tasks);
exit;*/

$days_already_exist = array();
$uid_already_exist = array();
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
						<li class="icon_search"><button class="desactive"><img class="search_logo" src="img/search_blueicon.png" alt="search_logo"/></button></li>
						<li class="adder"><a href="more.php">+</a></li>
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
			<?php
				$sql= "SELECT * FROM events WHERE events.from >=NOW() ORDER BY events.from ASC";
				$statement = $dbh->prepare($sql);
				$statement->execute();
				$events = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($events as $keys=>$e)
				{
					$event_date = explode(" ", $e['from'], 2);/*Get the date only*/
					/*convert datetime ton string*/
					$date_from = new DateTime($e['from']);
					$date_to = new DateTime($e['to']);
					
					if(!in_array((date_translate($date_from->format('l d m Y'))), $days_already_exist, true))
					{
					?>
					<!--<ul <?php// if($event_date[0] == date('Y-m-d')){ echo 'class="active_day"';} ?>>-->
					<ul class="active_day">
						<li>
						 <h3 class="date"><?php echo date_translate($date_from->format('l d m Y')); ?>
							<?php
							if($event_date[0] == date('Y-m-d'))
							{
							?>
							<span>(Aujourd'hui)</span>
							<?php
							}
							?>
						 </h3>
						</li>
						<li>
						 <ul class="planning">
						  <li class="wafel">
						   <ul>
							<li class="clock"><?php echo $date_from->format('H:i'). " ".$date_to->format('H:i') ?></li>
							<li>
							 <ul class="event">
							  <li class="rdv"><?php echo $e['event']?></li>
							  <li class="localisation"><?php echo $e['location']?></li>
							 </ul>
							</li>
						   </ul>
						  </li>
						  <?php
						  /*Add the day that exist to the array*/
							if(!in_array(date_translate($date_from->format('l d m Y')), $days_already_exist, true))
							{
								array_push($days_already_exist, date_translate($date_from->format('l d m Y')));
							}
							/*Push into array tasks already displayed*/
							if(!in_array($e['uid'], $uid_already_exist, true))
							{
								array_push($uid_already_exist, $e['uid']);
							}
							foreach($events as $keys_bis=>$r)
							{
								$date_from_bis = new DateTime($r['from']);
								$date_to_bis = new DateTime($r['to']);
								if(in_array((date_translate($date_from_bis->format('l d m Y'))), $days_already_exist, true) && !in_array($r['uid'], $uid_already_exist, true))
								{
						  ?>
						  <li class="wafel">
						   <ul>
							<li class="clock"><?php echo $date_from_bis->format('H:i'). " ".$date_to_bis->format('H:i') ?></li>
							<li>
							 <ul class="event">
							  <li class="rdv"><?php echo $r['event']?></li>
							  <li class="localisation"><?php echo $r['location']?></li>
							 </ul>
							</li>
						   </ul>
						  </li>
						  <?php
							}
						  }
						  ?>
						 </ul>
						</li>
						<?php
						$request_tasks = "SELECT * FROM tasks WHERE tasks.datetask BETWEEN CONCAT(:date_task, ' 00:00:00') AND CONCAT(:date_task, ' 23:59:59')";
						$task_statement = $dbh->prepare($request_tasks);
						$task_statement->bindParam(":date_task", $date_from->format('Y-m-d'));
						$task_statement->execute();
						$tasks = $task_statement->fetchAll(PDO::FETCH_ASSOC);
						//var_dump($tasks);
						?>
						<li>
							<div class="todo">
								  <h3>Vos tâches<span class="compteur">(<?php echo count($tasks); ?>)</span></h3>
								  <ul>
								  <?php
								  foreach ($tasks as $keys=>$t)
								  {
								?>
								   <li>
									<input name="shaker" type="checkbox"/>
									<label class="todo_right" name="shaker" for="shaker"><?php echo $t['task']; ?></label>
									<button class="supp" data-id="<?php echo $t['id']; ?>">-</button>
									</li>
								   <?php
								   }
								   ?>
								  </ul>
								  <form class="more" method="post" action="post_task.php">
								   <ul>
									<li><input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/><input id="datetask" class="disappear" name="datetask" type="text" value="<?php echo date_translate($date_from->format('Y-m-d')); ?>"/><input id="timetask" class="disappear" name="timetask" type="text" value="<?php echo date_translate($date_from->format('H:i:s')); ?>"/><input class="ok" type="submit" value="OK"/></li>
								   </ul>
								  </form>
								 </div>
							</li>
						</ul>
						<?php
					}
				}
			?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/func.js"></script>
</html>