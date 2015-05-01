<?php
session_start();
error_reporting(E_WARNING | E_ERROR);

//die('crackastrophique');
require_once('db_connect.php');

//die('crackastrophe');
if($_SESSION['logged_in'] != 'ok'){
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
    
    // Si pas d'erreurs.
	//die('crackotte');
    if(count($errors) < 1 ) {
        
        // Pour chaque tableau User où l'on définit $user, on vérifie si la clé username et password correspond a ce qui a été envoyé en $_POST.
		die('crack');
		$sql= "SELECT * FROM users WHERE username ='$username' && password ='$password'";
		echo $sql;
		exit;
		$dbh->execute($sql);
		// stock
		header('Location : semaine.php');
	} else {
		die('boum');
	}
        
        /*if( $username['username'] == $username && $password['password'] == $password ) {
                die('bordel');
                // si c'est le cas, on stocke l'username, le role et le fullname dans la session et on indique que logged_in est égale à ok avant de rediriger vers index.php.
                $_SESSION['username'] = $username['username'];
                $_SESSION['logged_in']= 'ok';
                die('proutility');
				header('Location : semaine.php');
                exit;
        } else{
			die("boum");
}
*/
        
    $errors['resultat'] = 'Nom d\'utilisateur introuvable...';
    }
    
} else {
    die('prout');
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
						</li>
						<li class="decal">
						<label class="disappear" for="password">Mot de passe</label>
						<input id="password" class="area" name="password" type="password" placeholder="Mot de passe..."/>
						</li>
						<li class="moit">
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