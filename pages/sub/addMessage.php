<?php
require 'connect.php';

if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['submit'])&&isset($_POST['message'])){
	$message = $_POST['message'];
	
	if(!empty($message)){
		$query = "INSERT INTO notify (message) VALUES ('$message')";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Message sent successfully.
			</div>';
		}
		else{
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Message not sent.
			</div>';
		}
	}
}
?>
<script>
function validate(){
	var message = document.getElementById("message").value;
	if(message == ""){
		alert("Please fill the field!");
	}
}
</script>
<form method="POST" onsubmit="return validate()"><!--form 1 start-->
		<!--table start-->
		  <table class="table main"><tbody><tr><td id="newtd"></td><td id="newtd">
		  <ol class="breadcrumb2">
          <li class="breadcrumb-item">
            <a href="index.php">SM System</a>
          </li>
		  <li class="breadcrumb-item">
            <a href="index.php?p=addStudent">Add</a>
          </li>
          <li class="breadcrumb-item active"><?php
				echo ucfirst(substr($_GET['p'],0,3)).' '.substr($_GET['p'],3,15);
				?></li>
		  </ol></td></tr>
		  <tr><td id="newtd"></td><td id="newtd"><?php echo $new; ?></td></tr>
		    <tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Message</label></td>
			  <td id="newtd"><textarea name="message" rows="5" id="message" class="form-control" placeholder="Type your message here..." autofocus></textarea></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Send Message</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->