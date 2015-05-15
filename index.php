<?php
require_once 'config.inc.php';


if($_SESSION['logged_in'] != 'ok'){

	if(isset($_POST['connexion'])){
		
		//sanatisation
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));
		$errors = array();
		
		//validation (si username est vide, on affiche error. Si password est vide, de même.)
		
		if( $username == '') {
            $errors['username'] = 'Nom d\'utilisateur ?';
        }
    	if ( $password == '') {
			$errors['password'] = 'Mot de passe ?';
    	}
    
		// Si pas d'erreurs, on vérifie s'il existe dans la DB
    	if(count($errors) < 1 ) {
        
			// Pour chaque tableau User où l'on définit $user, on vérifie si la clé username et password correspond a ce qui a été envoyé en $_POST.
			$sql= "SELECT * FROM users WHERE username =? && password =?";
			// echo $sql;
			$sth = $dbh->prepare($sql);
			$sth->execute(array($username, $password));
			$user = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			$_SESSION['user'] = $user;
			$_SESSION['logged_in'] = 'ok';
			//print_r($_SESSION);
			header('Location: semaine.php');
			die("you should be gone");
			exit;
		} else {
			$errors['resultat'] = 'Nom d\'utilisateur introuvable...';
		}
	die("formulaire posté mais rien");
	}
} else{
	header('Location: semaine.php');
	exit;
}

?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
			<ul class="balibalo">
				<li class="name_app"><h1>Yeti</h1></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
				<div class="logo">
				<img src="img/logo.png" alt="Yeti"/>
			</div>
			<form class="connect" method="post">
				<fieldset>
					<ol>
						<li class="decal">
						<label class="disappear" for="username">Nom d'utilisateur</label>
						<input id="username" class="area" name="username" type="text" placeholder="Nom d'utilisateur..."/>
						<?php echo message_erreur($errors, 'username');?>
						</li>
						<li class="decal">
						<label class="disappear" for="password">Mot de passe</label>
						<input id="password" class="area" name="password" type="password" placeholder="Mot de passe..."/>
						<?php echo message_erreur($errors, 'password');?>

						</li>
						<li class="moit" style="display:none">
						<input id="connected" name="connected" type="checkbox"/>
						<label for="connected">Rester connecté</label>
						</li>
						<li class="moit">
						<a href="#">(Mot de passe oublié ?)</a>
						</li>
						<li class="connect_elem">
						<label class="disappear" for="connexion">Se connecter</label>
						<input id="connexion" name="connexion" type="submit" value="Se connecter"/>
						</li>
						<li id="bottomity" class="moit">
						<a href="inscription.php">S'inscrire</a>
						</li>
					</ol>
				</fieldset>
			</form>
			</div>
		</div>
	</div>
</body>
</html>