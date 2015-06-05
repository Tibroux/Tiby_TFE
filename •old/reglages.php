<?php
require_once('config.inc.php');
require_once('trad.inc.php');

if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}

$name= "SELECT * FROM users WHERE id=:id;";
$u=$dbh->prepare($name);
$u->bindParam(":id",$_SESSION['user'][0]['id']);
$u->execute();
$usernamedb=$u->fetchAll(PDO::FETCH_ASSOC);



$q =  $dbh ->prepare($sql);
$q -> bindParam(":tadaa",$_SESSION['user'][0]['id']);
$q -> execute();
$tasks = $q->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réglages</title>
    
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
	<div class="container">
		<header class="phone">
			<ul class="salo">
				<li class="back"><a href="semaine.php"><img src="img/back_icon.png" alt="retour"/></a></li>
				<li><h1 class="space">Réglages</h1></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
			<form method="post" action="">
				<fieldset class="synchro">
					<h3>Synchronisation</h3>
					<ol>
						<li id="first_decal_synchro" class="decal">
						<input id="ical" class="synchronisor" name="ical" type="checkbox"/>
						<label class="synchronisor" for="ical">iCal</label>
						<label class="disappear" for="link_ical">Lien iCal</label>
						<input id="link_ical" class="area" name="link_ical" type="url" placeholder="Lien ics"/>
						</li>
						<li class="decal">
						<input id="googlecal" class="synchronisor" name="googlecal" type="checkbox"/>
						<label class="synchronisor" for="googlecal">Google Calendar</label>
						<label class="disappear" for="link_google">Lien Google Calendar</label>
						<input id="link_google" class="area" name="link_google" type="url" placeholder="Lien ics"/>
						</li>
						<li class="decal">
						<input id="extranet" class="synchronisor" name="extranet" type="checkbox"/>
						<label class="synchronisor" for="extranet">Autre</label>
						<label class="disappear" for="link_extranet">Lien autre</label>
							<input id="link_extranet" class="area" name="link_extranet" type="url" placeholder="Lien ics"/></li>
						</li>
					</ol>
				</fieldset>
				<fieldset class="compte">
					<h3>Compte</h3>
					<ol>
						<li id="first_decal_compte" class="decal">
						<label class="disappear" for="username">Nom d'utilisateur</label>
						<input id="username" class="area" name="username" type="text" placeholder="Nom d'utilisateur..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="email">E-mail</label>
						<input id="email" class="area" name="email" type="email" placeholder="E-mail..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="password">Changer le mot de passe</label>
						<input id="password" class="area" name="password" type="password" placeholder="Changer le mot de passe..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="confirm_mdp">Confirmer le mot de passe</label>
						<input id="confirm_mdp" class="area" name="confirm_mdp" type="password" placeholder="Confirmer le mot de passe..."/>
						</li>
					</ol>
				</fieldset>
				<input id="confirm_bottom" class="confirm_btn_bottom" name="confirm_bottom" type="submit" value="Confirmer"/>
			</form>
			<button class="deleter" data-id="<?php echo $t['id']; ?>">Supprimer le compte</button>
			</div>
		</div>
	</div>
</body>
</html>