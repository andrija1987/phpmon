<?php

$host = 'localhost';
$user = 'root';
$pass = 'Lokarda7';
$data = 'phpmon';
$sSetting['refresh'] = "10000";

mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($data) or die(mysql_error());
//Template options: "default" and "dark"
$template = "./templates/default/";
$index = $template . "index.php";
?>
