<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;


$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'includes/config.php';
include_once 'includes/data.inc.php';

$database = new Config();
$db = $database->getConnection();

$product = new Data($db);

$stmt = $product->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();

?>
<link href="css/custom.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php :: mon</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../templates/default/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">


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
      
  <p><br/></p>
    <div class="container"> 
     
<?php
if($num>0){
?>
  
	<table class="table table-inverse">
  <br>
	<thead>
	 <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Hostname</th>
          <th>Url</th>
          <th>Edit/Del</th>            
        </tr>
	</thead>
	<tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
?>
<tr>
	<?php echo "<td>{$id}</td>" ?>
	<?php echo "<td>{$name}</td>" ?>
    <?php echo "<td>{$host}</td>" ?>
	<?php echo "<td>{$url}</td>" ?>
	
	
  
	<?php echo "<td width='100px'>
	    <a class='btn btn-warning btn-sm' href='update.php?id={$id}' role='button'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
	    <a class='btn btn-danger btn-sm' href='delete.php?id={$id}' role='button'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
          </td>" ?>
</tr>
<?php
}
?>
	</tbody>
      </table>
<?php
$page_dom = "index.php";
include_once 'includes/pagination.inc.php';
}
else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong></div>
<?php
}
?>
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