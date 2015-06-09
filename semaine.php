<?php
require_once('config.inc.php');
require_once('function_trad_inc.php');
require_once('get_task.php');

/* require_once('trad.inc.php'); */

// vérifier s'il est loggué
if($_SESSION['logged_in'] != 'ok')
{
	header('Location: index.php');
	exit;
}

// date
//$today = "$day $daynum $month $year";
// nom d'utilisateur
$name= "SELECT * FROM users WHERE id = :id";
$u=$dbh->prepare($name);
$u->bindParam(":id",$_SESSION['user'][0]['id']);
$u->execute();
$usernamedb=$u->fetchAll(PDO::FETCH_ASSOC);
// la semaine de l'utilisateur dans la DB
//var_dump($_SESSION);
//var_dump($usernamedb);
$sql= "SELECT tasks.id,tasks.checked,tasks.datetask,tasks.task,tasks.user_id FROM tasks LEFT JOIN users ON users.id= tasks.user_id WHERE user_id = :tadaa";
//echo $sql;


$days_already_exist = array();
$uid_already_exist = array();
?>

<!DOCTYPE html>
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
		<meta name="viewport" content="width=device-width, initial-scale=1,minimal-ui"/>
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
					<ul>
						<?php 
							$date_array = array();
							$months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
						
							$id = 1;//$_SESSION["user"][0]["id"];
							$sql = "SELECT * FROM tasks WHERE tasks.datetask>=NOW() AND tasks.user_id = $id ORDER BY tasks.datetask DESC";
							
							$task = $dbh->prepare($sql);
							//$days->bindParam(':articleid', $articleid);
							$task->execute();
							$r_task = $task->fetchAll(PDO::FETCH_ASSOC);
							///echo "cocuou";
							for($i=0; $i<count($r_task); $i++)
							{
								if(!in_array($r_task[$i]["datetask"], $date_array))
								{
									array_push($date_array, $r_task[$i]["datetask"]);
								}
							}
							
							$sql = "SELECT * FROM events WHERE events.from >=NOW() AND events.user = $id ORDER BY events.from ASC";
							
							$events = $dbh->prepare($sql);
							//$days->bindParam(':articleid', $articleid);
							$events->execute();
							$r_events = $events->fetchAll(PDO::FETCH_ASSOC);
							
							for($i=0; $i<count($r_events); $i++)
							{
								if(!in_array($r_events[$i]["from"], $date_array))
								{
									array_push($date_array, $r_events[$i]["from"]);
								}
							}
							
							sort($date_array);
							
							
							for($i=0; $i<count($date_array); $i++)
							{
								$t1 =  date("Y m d", strtotime($date_array[$i]));
								$events = '<ul class="event">';
								$tasks = "";
								
								//Which event on this date?
								for($j = 0; $j<count($r_events); $j++)
								{
									$t2 =  date("Y m d", strtotime($r_events[$j]["from"]));
									if($t1 == $t2)
									{
										$events .= '<li class="clock">' . date("H:i", strtotime($r_events[$j]["from"])) . '</li><li><li class="rdv">' . $r_events[$j]["event"] . '</li><li class="localisation">' . $r_events[$j]["location"] . '</li></li>';
									}
								}

								$events .= '</ul>';
								
								//Which Task on this date?
								for($j=0; $j<count($r_task); $j++)
								{
									$t2 =  date("Y m d", strtotime($r_task[$j]['datetask']));
									if($t1 == $t2)
									{
										$task_data_id = $r_task[$j]["id"];
										if($r_task[$j]["checked"] == 1)
										{
											$tasks .= '<li><input id="task'.$task_data_id.'" name="shaker" type="checkbox" checked="checked" /><label for="task'.$task_data_id.'" class="todo_right" name="shaker" for="shaker">' . $r_task[$j]["task"] . '</label><button class="supp" data-id="' . $r_task[$j]["id"] . '">-</button></li>';
										}
										else
										{
											$tasks .= '<li><input id="task'.$task_data_id.'" name="shaker" type="checkbox"/><label for="task'.$task_data_id.'" class="todo_right" name="shaker" for="shaker">' . $r_task[$j]["task"] . '</label><button class="supp" data-id="' . $r_task[$j]["id"] . '">-</button></li>';
										}
									}
								}
								
								if($t1 > date("Y m d", strtotime($date_array[$i-1])))
								{
									echo '<ul class="active_day">
										<li>
											<h3 class="date">
												<span class="date">' . date("d", strtotime($date_array[$i])) . ' ' . $months[intval(date("m", strtotime($date_array[$i])))] . '</span>
											</h3>
										</li>
										<li>
											<ul class="planning">
												<li class="wafel">
													<ul>' . $events . '</ul>
												</li>
											</ul>
										</li>
										<li>
											<div class="todo">
												<h3>Vos tâches<span class="compteur">' . count($tasks) . '</span></h3>
												<ul>' . $tasks . '</ul>
												<form class="more" method="post" action="post_task.php">
													<ul>
														<li>
															<input class="add" name="add" type="text" placeholder="Ajouter une tâche..."/>
															<input id="datetask" class="disappear" name="datetask" type="text" value=""/>
															<input id="timetask" class="disappear" name="timetask" type="text" value=""/>
															<input class="ok" type="submit" value="OK"/>
														</li>
													</ul>
												</form>
											</div>
										</li>
									</ul>';
								}
							}
							
						?>
					</ul>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/autocomplete.js"></script>
	<script type="text/javascript" src="js/func.js"></script>
</html>