<?php
/*  CONFIGURATION DE YETI */
//session_save_path('/Users/Tiby/Sites/yeti-app.com/tmp');
session_start();
error_reporting(E_WARNING | E_ERROR);
date_default_timezone_set('Europe/Bruxelles');
setlocale(LC_ALL, array('fr_FR.UTF-8','fr_FR@euro','fr_FR','fr_BE','french','fra/fre','fr','frm','fro'));

require_once('db_connect.php');
require_once('functions.inc.php');