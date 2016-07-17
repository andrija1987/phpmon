<?php
include_once 'includes/config.php';

$database = new Config();
$db = $database->getConnection();

include_once 'includes/data.inc.php';
$product = new Data($db);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>php :: mon</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../templates/default/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
       
      	<nav class="navbar navbar-full navbar-inverse">
		<div class="navbar-brand center-block"> 
			<h3>php :: mon </h3>
		</div> 
		
	</nav>

  <div class="container">
  
<?php
if($_POST){

	$product->name = $_POST['name'];
	$product->url = $_POST['url'];
	$product->host = $_POST['host'];
	
	if($product->create()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <a href="index.php">View Data</a>.
</div>
<?php
	}else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Fail!</strong></div>
<?php
	}
}
?>
<form method="post">
  <div class="form-group">
    <label for="name">Name of server</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
   <div class="form-group">
    <label for="host">Hostname of server</label>
    <input type="text" class="form-control" id="host" name="host">
  </div>
  <div class="form-group">
    <label for="url">Url of server</label>
    <input type="text" class="form-control" id="url" name="url">
  </div>
 
    

  
  <button type="submit" class="btn btn-success">Save a server</button>
</form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<div id="footer">
        <div class="container navbar-fixed-bottom">
          <p class="text-muted credit text-center"><b>php :: mon</b>, made by  <a href="http://andrija1987.si">andrija1987.si</a></p>                      
        </div>
    </div>
  </body>
</html>