<?php
if($_GET)
{
	/* $mail = 'tibyoctet@gmail.com'; */ // Déclaration de l'adresse de destination.
	$mail = htmlspecialchars(strip_tags(trim($_GET['email'])));

	$passage_ligne = "\n";

	//Déclaration des messages au format texte et au format HTML.
	$message_txt = "I'm Batman !";
	$message_html = "<html><head></head><body><b>I</b>'m<i>Batman !</i>.</body></html>";
	 
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
?>