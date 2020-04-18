<?php
require 'connect.php';

session_start();

if(isset($_SESSION['type'])){
	if(($_SESSION['type'] == 'admin') || ($_SESSION['type'] == 'operator')){
		header("Location: index.php");
	}
	else if($_SESSION['type'] == 'student'){
		header("Location: student.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SM System 
	<?php
	if(!empty($_GET['p'])){
		$p = $_GET['p'];
		echo ' - '.ucfirst($p);
	}
	?>
	</title>
	<link rel="shortcut icon" type="favicon" href="boostrap/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style-1.css" rel="stylesheet">
    
  </head>

  <body>
  <!--cover start-->
  <div class="cover">
    <!--navbar start-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="welcome.php"><span class="glyphicon glyphicon-education"></span> SM System</a>
		</div>
		<div class="collapse navbar-collapse" id="navCollapse">
	      <ul class="nav navbar-nav navbar-right">
		    <li class="<?php
			$x='signup';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
			?>">
			<a href="welcome.php?p=signup">
		      <span class="glyphicon glyphicon-hourglass"></span>
			  Signup</a></li>
		    <li class="<?php
			$x='login';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
			?>">
			<a href="welcome.php?p=login">
		      <span class="glyphicon glyphicon-log-in"></span>
			  Login</a></li>
			  <li class="<?php
			$x='contact';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
			?>">
			<a href="contact.php">
		      <span class="glyphicon glyphicon-envelope"></span>
			  Contact</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!--navbar stop-->
	
	<!--container start-->
	<div class="container">
	<?php
	$pages_dir = 'pages';
	if(!empty($_GET['p'])){
		$pages = scandir($pages_dir,0);
		unset($pages[0],$pages[1],$pages[2]);

		$p = $_GET['p'];
		if(in_array($p.'.php',$pages)){
			include($pages_dir.'/'.$p.'.php');
		}
		else{
			echo 'Sorry, the page cannot find.';
		}
	}
	else{
		include($pages_dir.'/home.php');
	}
	?>
	</div><!--container stop--> 
  </div><!--cover stop-->
  
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="boostrap/js/jquery.min.js"></script>
    <script src="boostrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
	$connection->close(); 
?>