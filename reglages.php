<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réglages</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>
<body>
	<div class="container">
		<header class="phone">
			<ul class="salo">
				<li class="back"><a href="semaine.php">Aujourd'hui</a></li>
				<li><h1 class="space">Réglages</h1></li>
			</ul>
		</header>
		<div class="content">
			<div class="phone">
				<form class="synchro" action="post">
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
			<form class="compte" action="post">
				<fieldset>
					<legend>Compte</legend>
					<ol>
						<li id="first_decal_compte" class="decal">
						<label class="disappear" for="username">Nom d'utilisateur</label>
						<input id="username" class="area" name="username" type="text" placeholder="Nom d'utilisateur..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="email">E-mail</label>
						<input id="email" class="area" name="email" type="text" placeholder="E-mail..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="school">École</label>
						<input id="school" class="area" name="school" type="text" placeholder="École..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="change_password">Changer de mot de passe</label>
						<input id="change_password" class="area" name="change_password" type="text" placeholder="Changer de mot de passe..."/>
						</li>
						<li class="decal">
						<label class="disappear" for="confirm_password">Confirmer le mot de passe</label>
						<input id="confirm_password" class="area" name="confirm_password" type="text" placeholder="Confirmer le mot de passe..."/>
						</li>
						<li class="simule">
						<input id="localisation" name="localisation" type="checkbox"/>
						<label for="localisation">Localisation</label>
						</li>
						<li id="last_compte" class="simule">
						<input id="notifications" name="notifications" type="checkbox"/>
						<label for="notifications">Notifications</label>
						</li>
						<li class="confirm_btn_bottom"><input id="confirm_bottom" name="confirm_bottom" type="submit" value="Confirmer"/></li>
					</ol>
				</fieldset>
			</form>
			</div>
		</div>
	</div>
</body>
</html>