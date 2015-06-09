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
		$query = 'INSERT INTO users(username,password,email,confirm_email) VALUES(:username, :password, :email, :confirm_email);';
			$preparedStatement = $dbh->prepare($query);
			$preparedStatement->bindParam(":username", $username);
			$preparedStatement->bindParam(":password", $password);
			$preparedStatement->bindParam(":email", $email);
			$preparedStatement->bindParam(":confirm_email", $confirm_email);
			$preparedStatement->execute();
			
			
			/* $mail = 'tibyoctet@gmail.com'; */ // Déclaration de l'adresse de destination.
			$mail = $email;

			$passage_ligne = "\n";

			//Déclaration des messages au format texte et au format HTML.
			$message_txt = "Bonjour $username, \n \n Voici vos informations enregistrées lors de votre inscription, nous vous conseillons de garder cet e-mail en cas d'oubli : \n Nom d'utilisateur : $username \n Mot de passe : $password \n \n Nous vous remercions de votre inscription et espérons que vous apprécierez YETI autant que nous. \n Bien à vous, \n Le Yéti.";
			$message_html = "<html><head></head><body><h4>Bonjour $username,</h4><br/><p>Voici vos informations enregistrées lors de votre inscription, nous vous conseillons de garder cet e-mail en cas d'oubli :</p><p>Nom d'utilisateur :<b> $username</b><br/>Mot de passe :<b> $password</b></p><p>Nous vous remercions de votre inscription et espérons que vous apprécierez YETI autant que nous.</p><p>Bien à vous,</p><p>Le Yéti.</p></body></html>";
			 
			//Création de la boundary
			$boundary = "-----=".md5(rand());
			 
			//Définition du sujet.
			$sujet = "Bienvenue sur YETI !";
			 
			//Création du header de l'e-mail.
			$header = "From: \"Yeti-app\"<tibyoctet@gmail.com>".$passage_ligne;
			$header.= "Reply-to: \"Yeti-app\" <tibyoctet@gmail.com>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			 
			//Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;

			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;

			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			 
			//Envoi e-mail
			mail($mail,$sujet,$message,$header);
			header('Location:index.php');
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
				<input id="register_bottom" class="confirm_btn_bottom" name="register_bottom" type="submit" value="S'enregistrer"/>
			</form>
			</div>
		</div>
	</div>
</body>
</html>