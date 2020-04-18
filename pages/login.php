<?php
require 'connect.php';

if(isset($_SESSION['type'])){
	if(($_SESSION['type'] == 'admin') || ($_SESSION['type'] == 'operator')){
		header("Location: index.php");
	}
	else if($_SESSION['type'] == 'student'){
		header("Location: student.php");
	}
}



if(isset($_POST['submit'])&&isset($_POST['indexno'])&&isset($_POST['password'])){
	$username = $_POST['indexno'];
	$password = $_POST['password'];
	
	if(!empty($username)&&!empty($password)){
		$query = "SELECT * FROM student WHERE indexno='$username' AND password='$password'";
		$query2 = "SELECT * FROM admin WHERE indexno='$username' AND password='$password'";
		$query_run = $connection->query($query);
		$query_run_rows = $query_run->num_rows;
		$query_run2 = $connection->query($query2);
		$query_run_rows2 = $query_run2->num_rows;
			
		if($query_run_rows == 1){
			$row = $query_run->fetch_array(MYSQLI_ASSOC);
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['indexno'] = $row['indexno'];
			$_SESSION['type'] = 'student';
			header("Location: student.php");
		}
		else if($query_run_rows2 == 1){
			$row = $query_run2->fetch_array(MYSQLI_ASSOC);
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['type'] = $row['type'];
			header("Location: index.php");
		}
		else{
			echo 
			'<div class="alert alert-danger fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Inavalid username or password.
			</div>';
		}
	}
}
?>
<script>
function validate(){
	var uname = document.getElementById("inputEmail").value;
	var pw = document.getElementById("inputPassword").value;
	if(uname == "" && pw == ""){
		alert("Please fill the fields!");
	}
	else if(uname == ""){
		alert("Please enter username!");
	}
	else{
		if(pw == ""){
			alert("Please enter password!");
		}
	}
}
</script>
<div class="text-center cont">
		<font class="fonticon"><span class="glyphicon glyphicon-log-in"></span></font>
		<form class="form-signin" method="POST" onsubmit="return validate()">
        <h2 class="form-signin-heading">Please Login</h2>
        <label for="inputEmail" class="sr-only">Index No. / Employee Id</label>
        <input type="number" id="inputEmail" name="indexno" class="form-control" placeholder="Index No.  /  Employee Id" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
      </form>
	  
	  </div>