<?php
require 'connect.php';

session_start();
$new = '';
if(isset($_POST['submit'])){
	if(!empty($_POST['fname'])&&!empty($_POST['indexno'])&&!empty($_POST['subject'])&&!empty($_POST['email'])&&!empty($_POST['message'])){
		$name = $_POST['fname'];
		$indexno = $_POST['indexno'];
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		$mailto = 'vprabhathiya@gmail.com';
		$headers = 'From: '.$email;
		$txt = "You have an email from ".$email."\nIndex No. / Employee Id : ".$indexno."\n\n".$message;
		
		if(mail($mailto, $subject, $txt, $headers)){
			$new =
			'<div class="alert alert-success fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Mail send successfully.
			</div>
			';
		}
		else{
			$new =
			'<div class="alert alert-danger fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Mail send unsuccessfully.
			</div>
			';
		}
	}
}
?>
<script>
function validate(){
	var inputFname = document.getElementById("inputFname").value;
	var inputIndex = document.getElementById("inputIndex").value;
	var inputSubject = document.getElementById("inputSubject").value;
	var inputEmail = document.getElementById("inputEmail").value;
	var inputMessage = document.getElementById("inputMessage").value;
	if(inputFname == "" || inputIndex == "" || inputSubject == "" || inputEmail == "" || inputMessage == ""){
		alert("Please fill the fields!");
	}
}
</script>
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
	<link href="boostrap/css/bootstrap-social.css" rel="stylesheet">
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
		  <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-education"></span> SM System</a>
		</div>
		<div class="collapse navbar-collapse" id="navCollapse">
	      <ul class="nav navbar-nav navbar-right">
<?php
if(isset($_SESSION['type'])){
	echo '
		    <li><a href="index.php">
			<span class="glyphicon glyphicon-home"></span>  Home</a></li>
	';
}
else{
	echo '
			<li>
			<a href="welcome.php?p=signup">
		      <span class="glyphicon glyphicon-hourglass"></span>
			  Signup</a></li>
		    <li>
			<a href="welcome.php?p=login">
		      <span class="glyphicon glyphicon-log-in"></span>
			  Login</a></li>
	';
}
?>

			  <li class="active"><a href="contact.php">
		      <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
<?php
if(isset($_SESSION['type'])){
	echo '
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> ';
	echo ucfirst($_SESSION['fname']).' ('.ucfirst($_SESSION['type']).')';
	echo '
	 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </li>
	';
}
?>
		  </ul>
		</div>
	  </div>
	</nav>
	<!--navbar stop-->
	<!--container start-->
	<div class="container">
	  <div class="row text-center"><!--first row start-->
	  <div style="margin-top:80px; margin-left:10px;">
		<p>If you have any question or any problem with this Student Management System, feel free to contact us!</p></br>
	  </div>
	  </div><!--first row stop-->
	  <div class="row"><center>
		<a class="btn  btn-social btn-facebook" href="https://facebook.com/vprabhathiya">
        <i class="fa fa-facebook"></i> Contact us on Facebook
        </a>
		<a class="btn  btn-social btn-google-plus" href="https://facebook.com/vprabhathiya">
        <i class="fa fa-google-plus"></i> Contact us on Google+
        </a>
	  </center>
	  </div>
	  <div class="row">
	    <div class="col-md-offset-2 col-md-8">
			<?php echo '</br>'.$new; ?>
            <div class="panel panel-warning">
                <div class="panel-heading">Mail Us...</div>
                <div class="panel-body">
				  <form action="contact.php" method="POST" onsubmit="return validate()">
					<div class="form-group">
					<div class="form-row">
					<div class="col-md-6">
					<label for="inputFname" class="newlabel">Name</label>
					<input type="text" name="fname" id="inputFname" class="form-control" placeholder="Name" autofocus></div>
					<div class="col-md-6">
					<label for="inputIndex" class="newlabel">Index No / Employee Id</label>
					<input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No. / Employee Id"></div></div></div>
					<div class="form-group">
					<div class="col-md-12">
					<label for="inputSubject" class="newlabel">Subject</label>
					<input type="text" name="subject"  id="inputSubject" class="form-control" placeholder="Subject"></div></div>
					<div class="form-group">
					<div class="col-md-12">
					<label for="inputEmail" class="newlabel">Email Address</label>
					<input type="email" name="email"  id="inputEmail" class="form-control" placeholder="Email Address"></div></div>
					<div class="form-group">
					<div class="col-md-12">
					<label for="inputMessage" class="newlabel">Message</label>
					<textarea name="message"  id="inputMessage" class="form-control" placeholder="Type your message here..."></textarea></div></div>
					<div class="col-md-12">
					<button class="btn btn-lg btn-primary btn-block newbutton" type="submit" name="submit">Send Mail</button></div>
				  </form>
                </div>
            </div>
        </div>
	  </div>
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