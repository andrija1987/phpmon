<!DOCTYPE html>
<html>
	<head>
		<title>php :: mon</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">	-->
		<link href="<?php echo $template; ?>css/custom.css" rel="stylesheet">
		<!--<meta http-equiv="refresh" content="10">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
			
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	</head>
<body>
	
	<nav class="navbar navbar-full navbar-inverse">
		<div class="navbar-brand center-block"> 
			<h3>php :: mon </h3>
		</div> 
		
	</nav>

		<div class="container">
	<h4 style="margin-bottom:30px;text-align: center;">Monitored servers : </h4>
	<div class="table-responsive" style="margin-top: 30px;">
		<table class="table table-inverse">
			<thead>
			<tr>
				<th id="status" style="text-align: center;" >Status</th>
				<th id="name" style="text-align: center;">Name</th>
				<!--<th id="type">Type</th>-->
				<th id="host">Hostname</th>
				<!--<th id="location">Location</th>-->
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
          <p class="text-muted credit text-center"><b>php :: mon</b>, made by  <a href="http://andrija1987.si">andrija1987.si</a></p>                      
        </div>
    </div> </div>
			

	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<?php echo $sJavascript; ?>


</body>
</html>
