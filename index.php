<?php
require 'connect.php';
session_start();

if(isset($_SESSION['type'])){
if($_SESSION['type'] == 'admin'){
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
		  <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-education"></span> SM System</a>
		</div>
		<div class="collapse navbar-collapse" id="navCollapse">
	      <ul class="nav navbar-nav navbar-right">
		    <li class="active"><a href="index.php">
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
			<a href="index.php?p=home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
			</li>
			<li class="
	';
				$x='add';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,3)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> Add  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
				  <li class="
	';
				  $x='addMessage';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addMessage"><span class="fa fa-comments fa-fw"></span> Message</a></li>
				  <li class="
	';
				  $x='addOperator';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addOperator"><span class="fa fa-wrench fa-fw"></span> Operator</a></li>
                  <li class="
	';
				  $x='addStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                  <li class="
	';
				  $x='addSubject';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addSubject"><span class="fa fa-list-alt fa-fw"></span> Subject</a></li>
                  <li class="
	';
				  $x='addCourse';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addCourse"><span class="fa fa-list fa-fw"></span> Course</a></li>
				  <li class="
	';
				  $x='addResult';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addResult"><span class="fa fa-bar-chart-o fa-fw"></span> Results</a></li>
                </ul>
              </li>
			  <li class="
	';
				$x='remove';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,6)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-minus"></span> Remove  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
                  <li class="
	';
				  $x='removeOperator';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=removeOperator"><span class="fa fa-wrench fa-fw"></span> Operator</a></li>
				  <li class="
	';
				  $x='removeStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=removeStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                  <li class="
	';
				  $x='removeSubject';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=removeSubject"><span class="fa fa-list-alt fa-fw"></span> Subject</a></li>
                  <li class="
	';
				  $x='removeCourse';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=removeCourse"><span class="fa fa-list fa-fw"></span> Course</a></li>
                </ul>
              </li>
			  <li class="
	';
				$x='update';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,6)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span> Update  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
                  <li class="
	';
				  $x='updateMessage';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateMessage"><span class="fa fa-comments fa-fw"></span> Message</a></li>
				  <li class="
	';
				  $x='updateOperator';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateOperator"><span class="fa fa-wrench fa-fw"></span> Operator</a></li>
				  <li class="
	';
				  $x='updateStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                  <li class="
	';
				  $x='updateSubject';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateSubject"><span class="fa fa-list-alt fa-fw"></span> Subject</a></li>
				  <li class="
	';
				  $x='updateResult';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateResult"><span class="fa fa-bar-chart-o fa-fw"></span> Results</a></li>
                </ul>
              </li>
			  <li class="
	';
				$x='view';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,4)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list"></span> View  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
                  <li class="
	';
				  $x='viewMessage';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewMessage"><span class="fa fa-comments fa-fw"></span> Message</a></li>
				  <li class="
	';
				  $x='viewOperator';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewOperator"><span class="fa fa-wrench fa-fw"></span> Operator</a></li>
				  <li class="
	';
				  $x='viewStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                  <li class="
	';
				  $x='viewSubject';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewSubject"><span class="fa fa-list-alt fa-fw"></span> Subject</a></li>
                  <li class="
	';
				  $x='viewCourse';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewCourse"><span class="fa fa-list fa-fw"></span> Course</a></li>
				  <li class="
	';
				  $x='viewResult';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=viewResult"><span class="fa fa-bar-chart-o fa-fw"></span> Results</a></li>
                </ul>
              </li>
	      </ul>
	    </div><!--sidebar stop-->
		</div>
		<!--main content start-->
		<div class="col-sm-7 col-sm-offset-3  col-xs-offset-1 col-md-8 col-md-offset-0">
	';
		$pages_dir = 'pages/sub';
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
else if($_SESSION['type'] == 'operator'){
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
		  <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-education"></span> SM System</a>
		</div>
		<div class="collapse navbar-collapse" id="navCollapse">
	      <ul class="nav navbar-nav navbar-right">
		    <li class="active"><a href="index.php">
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
			<a href="index.php?p=home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
			</li>
			<li class="
	';
				$x='add';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,3)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> Add  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
                  <li class="
	';
				  $x='addMessage';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addMessage"><span class="fa fa-comments fa-fw"></span> Message</a></li>
				  <li class="
	';
				  $x='addStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                  <li class="
	';
				  $x='addSubject';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addSubject"><span class="fa fa-list-alt fa-fw"></span> Subject</a></li>
                  <li class="
	';
				  $x='addCourse';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addCourse"><span class="fa fa-list fa-fw"></span> Course</a></li>
				  <li class="
	';
				  $x='addResult';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=addResult"><span class="fa fa-bar-chart-o fa-fw"></span> Results</a></li>
                </ul>
              </li>
			  <li class="
	';
				$x='remove';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,6)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-minus"></span> Remove  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
				  <li class="
	';
				  $x='removeStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=removeStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                </ul>
              </li>
			  <li class="
	';
				$x='update';
				if(!empty($_GET['p'])){
					if(substr($_GET['p'],0,6)==$x){
					echo 'active';
					}
				}
	echo '
				">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span> Update  <span class="fa fa-sort-down fa-fw arrow"></span></a>
                <ul class="nav dropdown-menu nav-second-level">
				  <li class="
	';
				  $x='updateStudent';
				  if(!empty($_GET['p'])){
					  if($_GET['p']==$x){
					  echo 'active';
					  }
				  }
	echo '
				  "><a href="index.php?p=updateStudent"><span class="fa fa-group fa-fw"></span> Student</a></li>
                </ul>
              </li>
	      </ul>
	    </div><!--sidebar stop-->
		</div>
		<!--main content start-->
		<div class="col-sm-7 col-sm-offset-3  col-xs-offset-1 col-md-8 col-md-offset-0">
	';
		$pages_dir = 'pages/sub';
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
else if($_SESSION['type'] == 'student'){
	header("Location: student.php");
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