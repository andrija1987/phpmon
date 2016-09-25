<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*$user = 'root';
$pass = 'Lokarda7';
$data = 'phpmon';


mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($data) or die(mysql_error());*/
//Template options: "default" and "dark"

//Template options: "default" and "dark"

$database = getenv('OPENSHIFT_MYSQL_DB_HOST');
$con = mysqli_connect($database,"phpmon,"geslo123","phpmon");
$sSetting['refresh'] = "10000";
$template = "./templates/default/";
$index = $template . "index.php";
?>
