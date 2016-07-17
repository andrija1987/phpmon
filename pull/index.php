<?php
include_once('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$con=mysqli_connect("localhost","root","Lokarda7","phpmon");
function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$sId = mysqli_real_escape_string($con, ($_GET['url']));
if(is_numeric($sId)){
	$data = mysqli_query($con, "SELECT * FROM servers WHERE id='$sId'");
	$result = mysqli_fetch_array($data);
	$url = "http://".$result['url']."/uptime.php";
	$output = get_data($url);
	if(($output == NULL) || ($output === false)){
		$array = array();
		$array['uptime'] = '
		<div class="progress">
			<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
		</div>
		';
		$array['load'] = '
		<div class="progress">
			<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
		</div>
		';
		$array['online'] = '
		<div class="progress">
			<div class="bar bar-danger" style="width: 100%;"><small>Down</small></div>
		</div>
		';
		echo json_encode($array);
	} else {
		$data = json_decode($output, true);
		$data["load"] = number_format($data["load"], 2);
		echo json_encode($data);
	}
}