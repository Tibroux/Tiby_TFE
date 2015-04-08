<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!--<link rel="stylesheet" href="css/styles.css" type="text/css"/>-->
</head>
<body>
	<header>
		<ul>
			<li class="back"><a href="#">Accueil</a></li>
			<li><h1>Inscription</h1></li>
			<li class="confirm_btn"><input id="register" name="register" type="submit" value="Enregistrer"/></li>
		</ul>
	</header>
	<div class="content">
		<form class="synchro" action="post">
			<fieldset>
				<legend>Synchronisation</legend>
				<ol>
					<li>
					<label for="ical">iCal</label>
					<input id="ical" name="ical" type="checkbox"/>
					</li>
					<li>
					<label for="googlecal">Google Calendar</label>
					<input id="googlecal" name="googlecal" type="checkbox"/>
					</li>
					<li>
					<label for="extranet">Extranet Étudiant</label>
					<input id="extranet" name="extranet" type="checkbox"/>
					<ol>
						<li>
						<label for="link_extranet">Lien extranet</label>
						<input id="link_extranet" name="link_extranet" type="text" placeholder="Lien extranet..."/></li>
					</ol>
					</li>
				</ol>
			</fieldset>
		</form>
		<form class="compte" action="post">
			<fieldset>
				<legend>Compte</legend>
				<ol>
					<li>
					<label for="username">Nom d'utilisateur</label>
					<input id="username" name="username" type="text" placeholder="Nom d'utilisateur..."/>
					</li>
					<li>
					<label for="password">Mot de passe</label>
					<input id="password" name="password" type="text" placeholder="Mot de passe..."/>
					</li>
					<li>
					<label for="school">École</label>
					<input id="school" name="school" type="text" placeholder="École..."/>
					</li>
					<li>
					<label for="email">E-mail</label>
					<input id="email" name="email" type="text" placeholder="E-mail..."/>
					</li>
					<li>
					<label for="confirm_email">Confirmation e-mail</label>
					<input id="confirm_email" name="confirm_email" type="text" placeholder="Confirmation e-mail..."/>
					</li>
					<li>
					<label for="localisation">Localisation</label>
					<input id="localisation" name="localisation" type="checkbox"/>
					</li>
					<li>
					<label for="notifications">Notifications</label>
					<input id="notifications" name="notifications" type="checkbox"/>
					</li>
				</ol>
			</fieldset>
		</form>
	</div>
</body>
</html>