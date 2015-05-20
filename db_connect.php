<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=nameofdb', 'nameofdb', 'passwordofdb');
	$dbh->exec('SET CHARACTER SET utf8');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die('connection failed');
}
