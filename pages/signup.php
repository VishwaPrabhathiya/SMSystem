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

if(isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$indexno = $_POST['indexno'];
	
	if(!empty($email)&&!empty($password)){
		$query = "UPDATE student SET email='$email', password='$password' WHERE indexno='$indexno'";
		$query_run = $connection->query($query);
		if($query_run){
			echo 
			'<div class="alert alert-success fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Now you can login to the system.
			</div>';
		}
		else{
			echo 
			'<div class="alert alert-danger fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Entered data are wrong.
			</div>';
		}
	}

}
?>
<script>
function validate(){
	var index = document.getElementById("inputIndex").value;
	if(index == ""){
		alert("Please enter Index Number!");
	}
}
</script>
<div class="text-center">
		<font style="font-size:50px;"><span class="glyphicon glyphicon-hourglass"></span></font>
		<form class="form-signup" method="POST" onsubmit="return validate()">
        <h3 class="form-signup-heading">Please Search Index no.</h3>
		<center>
		<table><tbody><tr><td>
		<label for="inputIndex" class="sr-only">Index No</label>
        <input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No" autofocus></td>
		<td><button style="margin-top:10px; margin-left:10px;" class="btn btn-lg btn-success" name="search" type="submit">Search</button></td>
		</tr></table></tbody>
		</center></form></br>
<?php
	if(isset($_POST['search'])&&!(empty($_POST['indexno']))){
	$search = $_POST['indexno'];
	if(!(strlen($search)>5)){
		$search_q = "SELECT * FROM student WHERE indexno='$search';";
		$query_s = $connection->query($search_q);
		$query_check = $query_s->num_rows;
		if($query_check > 0){
			while($row = $query_s->fetch_array(MYSQLI_ASSOC)){
				echo '
	  <form class="form-signup" method="POST">
		<div class="form-group">
		<div class="form-row">
		<div class="col-md-6">
		<label for="inputFname" class="newlabel">First Name</label>
        <input readonly type="text" name="fname" id="inputFname" class="form-control" placeholder="First Name" value="'.$row['fname'].'" required></div>
		<div class="col-md-6">
		<label for="inputLname" class="newlabel">Last Name</label>
        <input readonly type="text" name="lname" id="inputLname" class="form-control" placeholder="Last Name" value="'.$row['lname'].'" required></div></div></div>
		<div class="form-group">
		<div class="form-row">
		<div class="col-md-6">
		<label for="inputIndex" class="newlabel">Gender</label>
        <input readonly type="text" name="gender" id="inputIndex" class="form-control" placeholder="Gender" value="'.$row['gender'].'" required></div>
		<div class="col-md-6">
        <label for="inputEmail" class="newlabel">Index No</label>
        <input readonly type="number" name="indexno" id="inputEmail" class="form-control" placeholder="Index No." value="'.$row['indexno'].'" required></div></div></div>
		<div class="form-group">
		<div class="col-md-12">
        <label for="inputPassword" class="newlabel">Course</label>
        <input readonly type="text" name="cname"  id="inputPassword" class="form-control" placeholder="Course" value="'.$row['cname'].'" required></div></div>
		<div class="form-group">
		<div class="col-md-12">
        <label for="inputPassword" class="newlabel">Email Address</label>
        <input type="email" name="email"  id="inputPassword" class="form-control" placeholder="Email Address" required autofocus></div></div>
		<div class="form-group">
		<div class="col-md-12">
        <label for="inputPassword" class="newlabel">Password</label>
        <input type="password" name="password"  id="inputPassword" class="form-control" placeholder="Password" required></div></div>
		<div class="col-md-12">
        <button class="btn btn-lg btn-primary btn-block newbutton" type="submit" name="submit">Signup</button></div>
      </form>';
			}
		}
		else{
			echo '<div class="alert alert-danger fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. is wrong.
			</div>';
		}
	}
	else{
			echo '<div class="alert alert-danger fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. is too large.
			</div>';
	}	
}
?>
	  </div>