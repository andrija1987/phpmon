<?php
include_once('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $sJavascript, $sTable;

$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbpwd = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATABASE");
$connection = new mysqli($dbhost, phpmon, geslo123, phpmon);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}
$connection->close();




$query=mysqli_query($connection, "SELECT * FROM servers ORDER BY id") or die(mysqli_error());
	$sJavascript .= '<script type="text/javascript">
		function uptime() {
			$(function() {';

while($result = mysqli_fetch_array($query)) {
	$sJavascript .= '$.getJSON("pull/index.php?url='.$result["id"].'",function(result){
	$("#online'.$result["id"].'").html(result.online);
	$("#uptime'.$result["id"].'").html(result.uptime);
	$("#load'.$result["id"].'").html(result.load);
	$("#memory'.$result["id"].'").html(result.memory);
	$("#hdd'.$result["id"].'").html(result.hdd);
	});';
	$sTable .= '

		<tr>
			<td id="online'.$result["id"].'">
				<div class="progress">
					<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
				</div>
			</td>
			<td>'.$result["name"].'</td>
			<td>'.$result["host"].'</td>
			<td id="uptime'.$result["id"].'">n/a</td>
			<td id="load'.$result["id"].'">n/a</td>
			<td id="memory'.$result["id"].'">
				<div class="progress progress-striped active">
					<div class="bar bar-danger" style="width: 100%;"><small>n/a</small></div>
				</div>
			</td>
			<td id="hdd'.$result["id"].'">
				<div class="progress progress-striped active">
					<div class="bar bar-danger" style="width: 100%;"><small>n/a</small></div>
				</div>
			</td>

		</tr>
	';
}
	$sJavascript .= '});
	}
	uptime();
	setInterval(uptime, '.$sSetting['refresh'].');
	</script>';

include ($index);



?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
