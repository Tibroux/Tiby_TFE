<?php
require_once('config.inc.php');
require_once('trad.inc.php');

if($_SESSION['logged_in'] != 'ok') {
	header('Location: index.php');
	exit;
}

function is_valid_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST)
{
	$error ="";
	$ical = htmlspecialchars(strip_tags(trim($_POST['ical'])));
	$googlecal = htmlspecialchars(strip_tags(trim($_POST['googlecal'])));
	$other = htmlspecialchars(strip_tags(trim($_POST['other'])));
	$username = htmlspecialchars(strip_tags(trim($_POST['username'])));
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
	$password = htmlspecialchars(strip_tags(trim($_POST['password'])));
	$confirm_mdp = htmlspecialchars(strip_tags(trim($_POST['confirm_mdp'])));
	
	$username_check = array();

	$sql= "SELECT id, username FROM users WHERE id !=:userID";
	$u=$dbh->prepare($sql);
	$u->bindParam(":userID", $_SESSION['user'][0]['id']);
	$u->execute();
	$users=$u->fetchAll(PDO::FETCH_ASSOC);

	foreach($users as $keys=>$usr)
	{
		array_push($username_check, strtolower($usr['username']));
	}
	
	if(in_array(strtolower($username), $username_check))
	{
		$error = "Erreur : ce nom d'utilisateur est déjà utilisé";
	}
	
	if(strlen($username) < 3)
	{
		$error = "Erreur : le nom d'utilisateur requiert minimum 3 caractères";
	}
	
	if(is_valid_email($email) == false)
	{
		$error = "Erreur : e-mail invalide";
	}
	
	if(strlen($password)>0)
	{
		if(strlen($password) < 4)
		{
			$error = "Erreur : le mot de passe requiert minimum 4 caractères";
		}
		
		if($password != $confirm_mdp)
		{
			$error = "Erreur : les mots de passe de correspondent pas";
		}
	}
	
	if(strlen($error) == 0)
	{
		if(strlen($password)>0)
		{
			$sql = "UPDATE users SET users.username =:username, users.password=:password, users.email=:email, users.confirm_email=:confirm_email, users.ical=:ical, users.googlecal=:googlecal, users.other=:other WHERE id=:userID";
			$preparedStatement = $dbh->prepare($sql);
			$preparedStatement->bindParam(":username",$username);
			$preparedStatement->bindParam(":password",$password);
			$preparedStatement->bindParam(":email",$email);
			$preparedStatement->bindParam(":confirm_email",$email);
			$preparedStatement->bindParam(":ical",$ical);
			$preparedStatement->bindParam(":googlecal",$googlecal);
			$preparedStatement->bindParam(":other",$other);
			$preparedStatement->bindParam(":userID",$_SESSION['user'][0]['id']);
			$preparedStatement->execute();
			
			$_SESSION['user'][0]['username'] = $username;
			$_SESSION['user'][0]['email'] = $email;
			$_SESSION['user'][0]['confirm_email'] = $email;
			
			if(strlen($ical)==0 || strlen($googlecal)==0 || strlen($other)==0)
			{
				$sql = "DELETE FROM events WHERE user = :userID";
				$preparedStatement = $dbh->prepare($sql);
				$preparedStatement->bindParam(':userID', $_SESSION['user'][0]['id']);
				$preparedStatement->execute();
			}
			
			if(strlen($ical)>1 || strlen($googlecal)>1 || strlen($other)>1)
			{
				header('Location:event.php');
			}
		}
		else
		{
			$sql = "UPDATE users SET users.username =:username, users.email=:email, users.confirm_email=:confirm_email, users.ical=:ical, users.googlecal=:googlecal, users.other=:other WHERE id=:userID";
			$preparedStatement = $dbh->prepare($sql);
			$preparedStatement->bindParam(":username",$username);
			$preparedStatement->bindParam(":email",$email);
			$preparedStatement->bindParam(":confirm_email",$email);
			$preparedStatement->bindParam(":ical",$ical);
			$preparedStatement->bindParam(":googlecal",$googlecal);
			$preparedStatement->bindParam(":other",$other);
			$preparedStatement->bindParam(":userID",$_SESSION['user'][0]['id']);
			$preparedStatement->execute();
			
			$_SESSION['user'][0]['username'] = $username;
			$_SESSION['user'][0]['email'] = $email;
			$_SESSION['user'][0]['confirm_email'] = $email;
			
			if(strlen($ical)==0 || strlen($googlecal)==0 || strlen($other)==0)
			{
				$sql = "DELETE FROM events WHERE user = :userID";
				$preparedStatement = $dbh->prepare($sql);
				$preparedStatement->bindParam(':userID', $_SESSION['user'][0]['id']);
				$preparedStatement->execute();
			}
			
			if(strlen($ical)>1 || strlen($googlecal)>1 || strlen($other)>1)
			{
				header('Location:event.php');
			}
		}
	}
	else
	{
		$_SESSION['user'][0]['error'] = $error;
		header('Location:reglages.php');
		exit();
	}
}

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
</head>
<body>
	<div class="container">
		<header class="phone">
			<ul class="salo">
				<li class="back"><a href="semaine.php"><img src="img/back_icon.png" alt="retour"/></a></li>
				<li><h1 id="rules" class="space">Réglages</h1></li>
				<li class="logout"><a href="logout.php"><img src="img/logout_icon.png" alt="déconnexion"></a></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
			<?php
				$sql= "SELECT * FROM users WHERE id=:id;";
				$u=$dbh->prepare($sql);
				$u->bindParam(":id",$_SESSION['user'][0]['id']);
				$u->execute();
				$user=$u->fetchAll(PDO::FETCH_ASSOC);
			if(strlen($_SESSION['user'][0]['error'])>0)
			{
			?>
			<p class="error"><?php
				echo $_SESSION['user'][0]['error'];
				unset($_SESSION['user'][0]['error']);
			?></p>
			<?php
			}
			?>
			<form method="post" action="">
				<fieldset class="synchro">
					<h3>Synchronisation</h3>
					<ol>
						<li id="first_decal_synchro" class="decal">
							<label class="synchronisor" for="ical">iCal</label>
							<input id="ical" class="area" name="ical" type="url" placeholder="Lien ics..." value="<?php if(strlen($user[0]['ical']) >0){echo $user[0]['ical'];} ?>" />
						</li>
						<li class="decal">
							<label class="synchronisor" for="googlecal">Google Calendar</label>
							<input id="googlecal" class="area" name="googlecal" type="url" placeholder="Lien ics..." value="<?php if(strlen($user[0]['googlecal']) >0){echo $user[0]['googlecal'];} ?>"/>
						</li>
						<li class="decal">
							<label class="synchronisor" for="other">Autre</label>
							<input id="other" class="area" name="other" type="url" placeholder="Lien ics..." value="<?php if(strlen($user[0]['googlecal']) >0){echo $user[0]['googlecal'];} ?>"/>
						</li>
					</ol>
				</fieldset>
				<fieldset class="compte">
					<h3>Compte</h3>
					<ol>
						<li id="first_decal_compte" class="decal">
							<label class="disappear" for="username">Nom d'utilisateur</label>
							<input id="username" class="area" name="username" type="text" placeholder="Nom d'utilisateur..." value="<?php if(count($user[0]['username']) >0){echo $user[0]['username'];} ?>"/>
						</li>
						<li class="decal">
							<label class="disappear" for="email">E-mail</label>
							<input id="email" class="area" name="email" type="email" placeholder="E-mail..." value="<?php echo $user[0]['email']; ?>"/>
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
			<button class="deleter" data-id="<?php echo $user[0]['id']; ?>">Supprimer le compte</button>
			</div>
		</div>
	</div>
</body>
</html>