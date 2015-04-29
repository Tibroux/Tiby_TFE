<?php

require_once('db_connect.php');
function is_valid_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//form processing
if($_POST) {
	// nettoyage
	$username = strip_tags(trim($_POST['username']));
	$password = strip_tags(trim($_POST['password']));
	$school = strip_tags(trim($_POST['school']));
	$email = strip_tags(trim($_POST['email']));
	$confirm_email = strip_tags(trim($_POST['confirm_email']));
	
	if($username == '') {
		echo "*Nom d'utilisateur";
	}
	if($password == '') {
		echo "*Mot de passe";
	}
	if(is_valid_email($email) == false) {
		echo '*Email';
	}
	if(is_valid_email($confirm_email) == false) {
		echo '*Confirmation de votre email';
	}
	else {
	//ici l'envoi d'email
	// on termine
	echo 'Merci de votre inscription.';
	}
	$query = 'INSERT INTO users(username,password,school,email,confirm_email) VALUES(:username, :password, :school, :email, :confirm_email);';
		$preparedStatement = $dbh->prepare($query);
		$preparedStatement->bindParam(":username", $username);
		$preparedStatement->bindParam(":password", $password);
		$preparedStatement->bindParam(":school", $school);
		$preparedStatement->bindParam(":email", $email);
		$preparedStatement->bindParam(":confirm_email", $confirm_email);
		$preparedStatement->execute();
}


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>
<body>
	<div class="container">
		<header class="phone">
		<ul class="salo">
			<li class="back"><a href="#">Accueil</a></li>
			<li><h1>Inscription</h1></li>
		</ul>
	</header>
	<div class="content">
		<div class="phone">
			<form class="synchro" method="post">
			<fieldset>
				<legend>Synchronisation</legend>
				<ol>
					<li id="first_decal_synchro" class="decal">
					<input id="ical" name="ical" type="checkbox"/>
					<label for="ical">iCal</label>
					</li>
					<li class="decal">
					<input id="googlecal" name="googlecal" type="checkbox"/>
					<label for="googlecal">Google Calendar</label>
					</li>
					<li class="decal">
					<input id="extranet" name="extranet" type="checkbox" checked/>
					<label for="extranet">Extranet Étudiant</label>
					<ol>
						<li>
						<label class="disappear" for="link_extranet">Lien extranet</label>
						<input id="link_extranet" class="area" name="link_extranet" type="text" placeholder="Lien extranet..."/></li>
					</ol>
					</li>
				</ol>
			</fieldset>
		</form>
		<form class="compte" method="post" action="semaine.php">
			<fieldset>
				<legend>Compte</legend>
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
					<label class="disappear" for="school">École</label>
					<input id="school" class="area" name="school" type="text" placeholder="École..."/>
					</li>
					<li class="decal">
					<label class="disappear" for="email">E-mail</label>
					<input id="email" class="area" name="email" type="text" placeholder="E-mail..."/>
					</li>
					<li class="decal">
					<label class="disappear" for="confirm_email">Confirmation e-mail</label>
					<input id="confirm_email" class="area" name="confirm_email" type="text" placeholder="Confirmation e-mail..."/>
					</li>
					<li class="simule">
					<input id="localisation" name="localisation" type="checkbox"/>
					<label for="localisation">Localisation</label>
					</li>
					<li id="last_compte" class="simule">
					<input id="notifications" name="notifications" type="checkbox"/>
					<label for="notifications">Notifications</label>
					</li>
					<li class="confirm_btn"><input id="register" name="register" type="submit" value="Enregistrer"/></li>
				</ol>
			</fieldset>
		</form>
		</div>
	</div>
	</div>
</body>
</html>