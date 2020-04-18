<?php
if(!($_SESSION['type'] == 'student')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}

$new = '';
if(isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$indexno = $_POST['indexno'];
	
	if(!empty($email)&&!empty($password)){
		$query = "UPDATE student SET email='$email', password='$password' WHERE indexno='$indexno'";
		$query_run = $connection->query($query);
		if($query_run){
			$new =
			'<div class="alert alert-success fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Details updated.
			</div>';
		}
		else{
			$new =
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
<div class="col-xs-offset-2 col-sm-offset-1 col-md-12 col-sm-12">
	<div class="panelmain">
                <div class="col-md-12">
				<ol class="breadcrumb2">
					<li class="breadcrumb-item">
						<a href="student.php">SM System</a>
					</li>
					<li class="breadcrumb-item active">Profile</li>
				</ol>
<?php
	$search = $_SESSION['indexno'];
	$search_q = "SELECT * FROM student WHERE indexno='$search';";
	$query_s = $connection->query($search_q);
	if($query_s){
		$row = $query_s->fetch_array(MYSQLI_ASSOC);
		echo '
<form class="form-signup" style="margin-top:10px; max-width:830px;" method="POST">
		<div class="form-group">
		<div class="col-md-12">';
        echo $new;
		echo '
		</div></div>

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
        <input type="email" name="email"  id="inputPassword" class="form-control" placeholder="Email Address" value="'.$row['email'].'" required autofocus></div></div>
		<div class="form-group">
		<div class="col-md-12">
        <label for="inputPassword" class="newlabel">Password</label>
        <input type="text" name="password"  id="inputPassword" class="form-control" placeholder="Password" value="'.$row['password'].'" required></div></div>
		<div class="col-md-12">
        <button class="btn btn-lg btn-primary btn-block newbutton" type="submit" name="submit">Update Details</button></div>
</form>';
	}
?>
</div>
	</div>
</div>