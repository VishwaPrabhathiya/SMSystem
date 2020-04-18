<?php
require 'connect.php';
session_start();

if(isset($_SESSION['type'])){
if($_SESSION['type'] == 'student'){
	echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SM System</title>
	<link rel="shortcut icon" type="favicon" href="boostrap/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style-1.css" rel="stylesheet">
	<link href="css/style-2.css" rel="stylesheet">
	<link href="css/style-main-0.css" rel="stylesheet">
	<link href="boostrap/css/font-awesome.min.css" rel="stylesheet">
    
  </head>

  <body>
  <!--cover start-->
  <div class="cover">
    <!--navbar start-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="student.php"><span class="glyphicon glyphicon-education"></span> SM System</a>
		</div>
		<div class="collapse navbar-collapse" id="navCollapse">
	      <ul class="nav navbar-nav navbar-right">
		    <li class="active"><a href="student.php">
			<span class="glyphicon glyphicon-home"></span>  Home</a></li>
			  <li><a href="contact.php">
		      <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 
	';
		echo ucfirst($_SESSION['fname']).' ('.ucfirst($_SESSION['type']).')';
	echo '
	 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!--navbar stop-->
	<!--container start-->
	<div class="container-fluid">
	  <div class="row"><!--first row start-->
	    <div class="col-sm-3 col-md-2">
		<div class="sidebar"><!--sidebar start-->
		  <ul class="nav nav-sidebar">
		  <li class="
	';
			$x='';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
	echo '
			">
			<a href="student.php?p=home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
			</li>
			<li class="
	';
			$x='profile';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
	echo '
			">
			<a href="student.php?p=profile"><span class="glyphicon glyphicon-th"></span> Profile</a>
			</li>
			<li class="
	';
			$x='results';
			if(!empty($_GET['p'])){
				if($_GET['p']==$x){
					echo 'active';
				}
			}
	echo '
			">
			<a href="student.php?p=results"><span class="glyphicon glyphicon-stats"></span> Results</a>
			</li>
	      </ul>
	    </div><!--sidebar stop-->
		</div>
		<!--main content start-->
		<div class="col-sm-7 col-sm-offset-3  col-xs-offset-1 col-md-8 col-md-offset-0">
	';
		$pages_dir = 's_pages';
		if(!empty($_GET['p'])){
		$pages = scandir($pages_dir,0);
		unset($pages[0],$pages[1]);
		
		$p = $_GET['p'];
		if(in_array($p.'.php',$pages)){
			include($pages_dir.'/'.$p.'.php');
		}
		else{
			echo '
			<div class="alert alert-danger fade in text-center col-xs-offset-3" style="margin-top: 80px;" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			</button>
			<strong>Sorry!</strong> Page not found.
			</div>
			';
		}
		}
		else{
		include($pages_dir.'/home.php');
		}
	echo '
		</div><!--main content stop-->
	  </div><!--first row stop-->
	</div><!--container stop--> 
  </div><!--cover stop-->
  
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="boostrap/js/jquery.min.js"></script>
    <script src="boostrap/js/bootstrap.min.js"></script>
  </body>
</html>
	';
}
else{
	echo '<strong>404</strong> Sorry page not found.';
}
}
else{
	header("Location: welcome.php");
}

$connection->close();
?>