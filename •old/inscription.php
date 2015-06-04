<?php

require_once('db_connect.php');
function is_valid_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$errors="";

//form processing
if($_POST) {
	// nettoyage
	$username = strip_tags(trim($_POST['username']));
	$password = strip_tags(trim($_POST['password']));
	$email = strip_tags(trim($_POST['email']));
	$confirm_email = strip_tags(trim($_POST['confirm_email']));
	
	if($username == '') {
		$errors = "username";
	}
	if($password == '') {
		$errors = "password";
	}
	if(is_valid_email($email) == false) {
		$errors = "email";
	}
	if($email != $confirm_email) {
		$errors = "confirm email";
	}
	
	if($errors == "")
	{
		$query = 'INSERT INTO users(username,password,school,email,confirm_email) VALUES(:username, :password, :school, :email, :confirm_email);';
			$preparedStatement = $dbh->prepare($query);
			$preparedStatement->bindParam(":username", $username);
			$preparedStatement->bindParam(":password", $password);
			$preparedStatement->bindParam(":email", $email);
			$preparedStatement->bindParam(":confirm_email", $confirm_email);
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
    <title>Inscription</title>
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
				<li><h1>Inscription</h1></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
			<form method="post" action="">
				<fieldset class="compte">
					<h3>Compte</h3>
					<ol>
						<li id="first_decal_compte" class="decal">
						<label class="disappear" for="username">Nom d'utilisateur</label>
						<input id="username" class="area" name="username" type="text" placeholder="Nom d'utilisateur..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="password">Mot de passe</label>
						<input id="password" class="area" name="password" type="password" placeholder="Mot de passe..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="email">E-mail</label>
						<input id="email" class="area" name="email" type="email" placeholder="E-mail..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="confirm_email">Confirmation e-mail</label>
						<input id="confirm_email" class="area" name="confirm_email" type="email" placeholder="Confirmation e-mail..."/>
						</li>
					</ol>
				</fieldset>
				<!--<fieldset class="synchro">
					<h3>Synchronisation</h3>
					<ol>
						<li id="first_decal_synchro" class="decal">
						<input id="ical" class="synchronisor" name="ical" type="checkbox"/>
						<label class="synchronisor" for="ical">iCal</label>
						<label class="disappear" for="link_ical">Lien iCal</label>
						<input id="link_ical" class="area" name="link_ical" type="url" placeholder="Lien ics, rss, ..."/>
						</li>
						<li class="decal">
						<input id="googlecal" class="synchronisor" name="googlecal" type="checkbox"/>
						<label class="synchronisor" for="googlecal">Google Calendar</label>
						<label class="disappear" for="link_google">Lien Google Calendar</label>
						<input id="link_google" class="area" name="link_google" type="url" placeholder="Lien ics, rss, ..."/>
						</li>
						<li class="decal">
						<input id="extranet" class="synchronisor" name="extranet" type="checkbox"/>
						<label class="synchronisor" for="extranet">Extranet Étudiant</label>
						<label class="disappear" for="link_extranet">Lien extranet</label>
							<input id="link_extranet" class="area" name="link_extranet" type="url" placeholder="Lien ics, rss, ..."/></li>
						</li>
					</ol>
				</fieldset>-->
				<input id="register_bottom" class="confirm_btn_bottom" name="register_bottom" type="submit" value="Confirmer"/>
			</form>
			</div>
		</div>
	</div>
</body>
</html>