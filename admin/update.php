<?php
include_once 'includes/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$database = new Config();
$db = $database->getConnection();

include_once 'includes/data.inc.php';
$product = new Data($db);

$product->id = $id;
$product->readOne();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>php :: mon</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <tilocatione></tilocatione>

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
    
      <p>
	<a class="btn btn-primary" href="index.php" role="button">Back View Data</a>
      </p><br/>
<?php
if($_POST){

	$product->name = $_POST['name'];
  $product->host = $_POST['host'];
  $product->url = $_POST['url'];
  
   
	
	if($product->update()){
?>
<script>window.location.href='index.php'</script>
<?php
	}else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Fail! Something went wrong!</strong>
</div>
<?php
	}
}
?>
<form method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value='<?php echo $product->name; ?>'>
  </div>
   <div class="form-group">
    <label for="host">Hostname</label>
    <input type="text" class="form-control" id="host" name="host" value='<?php echo $product->host; ?>'>
  </div>
  <div class="form-group">
    <label for="host">Url</label>
    <input type="text" class="form-control" id="url" name="url" value='<?php echo $product->url; ?>'>
  </div>
  
 
  <button type="submit" class="btn btn-success">Submit</button>
</form>
    </div>
<div id="footer">
        <div class="container navbar-fixed-bottom">
          <p class="text-muted credit text-center"><b>php :: mon</b>, made by  <a href="http://andrija1987.eu">andrija1987.eu</a></p>                      
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>