<?php
require_once('config.inc.php');

if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}

$today = "$day $daynum $month $year";
//$today = $day.' '.$daynum.' '.$month.' '.$year;

//form processing
if($_POST) {
	// nettoyage
	$task = htmlspecialchars(strip_tags(trim($_POST['task'])));
	$datetask = htmlspecialchars(strip_tags(trim($_POST['datetask'])));
	
	if($task == '') {
		$errors = "C'est mieux d'écrire quelque chose ici...";
	}
	if($errors == "")
	{
		$query = 'INSERT INTO tasks(checked,datetask,task) VALUES(:checked, :datetask, :task);';
			$preparedStatement = $dbh->prepare($query);
			$preparedStatement->bindParam(":task", $task);
			$preparedStatement->bindParam(":datetask", $datetask);
			$preparedStatement->execute();
			header("Location: semaine.php");
	}
	else{
		die($errors);
	}
}
?>

<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
    <meta name="author" content="Tiby Voesters"/>
    <meta name="description" content="La web-application Yeti, Pour vous aider à organiser vos journées."/>
    <meta name="keywords" content="tiby,voesters,web-app,dwm,production,mobile,organisation,étudiant,étudiants,beta,tfe"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <link rel="icon" href="img/icon_app.png"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!--<meta name="apple-mobile-web-app-status-bar-style" content="white"/>-->
    <meta name="apple-mobile-web-app-title" content="Yeti"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon-precomposed" href="img/icon_app.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,minimal-ui">

    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>
<body>
	<div class="container">
		<header class="phone">
			<ul class="salo">
				<li class="back"><a href="index.php"><img src="img/back_icon.png" alt="retour"></a></li>
				<li><h1 class="title_more">YETI</h1></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
			<form method="post" action="">
				<fieldset class="compte">
					<h3>Ajouter une tâche</h3>
					<ol>
						<li id="add_task" class="decal">
						<label class="disappear" for="task">Ajouter une tâche</label>
							<textarea id="task" class="area" name="username" placeholder="Ajouter une tâche..."></textarea>
						</li>
						<li class="decal">
						<label class="disappear" for="password">Date</label>
						<input id="datetask" class="area" name="datetask" type="date" placeholder="<?php echo $today ?>"/>
						</li>
					</ol>
				</fieldset>
				<input id="confirm_bottom" class="confirm_btn_bottom" name="confirm_bottom" type="submit" value="Confirmer"/>
			</form>
			</div>
		</div>
	</div>
</body>
</html>