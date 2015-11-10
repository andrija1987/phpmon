<!DOCTYPE html>
<html>
	<head>
		<title>phpmon</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<link href="<?php echo $template; ?>css/custom.css" rel="stylesheet">
		<style>
			body { padding-top: 100px; }
			@media (max-width: 979px) {
  				body { padding-top: 0px; }
			}
		</style>
	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">

		<div class="container" style="text-align:center;margin-top:15px;">
          <a class="" style="font-size: 32px;font-weight:230;line-height:1;color:#ffffff;" href="index.php">php :: mon</a></div>
	  <!--<div class="navbar-inner">
	  	<div class="container">
		    <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">phpmon</a></li>
        <li><a href="/../phpmon/administration/">Administration</a></li>
          </ul>
          </div>
	  </div>-->
	</div>
	<div class="container">
	<h3 style="margin-top:-20px;">Monitored servers:</h3>
	<br>	
		<table class="table table-striped table-condensed table-hover">
			<thead>
			<tr>
				<th id="status" style="text-align: center;">Status</th>
				<th id="name">Name</th>
				<th id="type">Type</th>
				<th id="host">Host</th>
				<th id="location">Location</th>
				<th id="uptime">Uptime</th>
				<th id="load">Load</th>
				<th id="ram">RAM</th>
				<th id="hdd">HDD</th>
				
			</tr>
			</thead>
			<tbody>
			<?php echo $sTable; ?>
			</tbody>
		</table></div>

<div id="footer">
        <div class="container navbar-fixed-bottom">
            <p class="text-muted credit text-center">AutoRefresh ( 5sec )</p>
           <p class="text-muted credit text-center"><b>php :: mon</b>, made by  <a href="http://andrija1987.eu">andrija1987.eu</a> 
           </p>
        </div>
    </div>
			

			
	
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<?php echo $sJavascript; ?>

	<script type="text/javascript">
	setTimeout(function refresh5(){ window.location.href = window.location.href; }, 5000);</script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="plugins/flot/jquery.flot.js"></script>
    <script src="plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="plugins/flot/jquery.flot.resize.js"></script>
    <script src="plugins/flot/jquery.flot.pie.js"></script>
    <script src="plugins/flot/flot-data.js"></script>


</body>
</html>
