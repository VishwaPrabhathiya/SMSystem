 <?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
$new = '';
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['indexno'])&&isset($_POST['email'])&&isset($_POST['password'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$indexno = $_POST['indexno'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = 'operator';
	
	if(!empty($fname)&&!empty($lname)&&!empty($indexno)&&!empty($email)&&!empty($password)){
		$query = "INSERT INTO admin (fname, lname, indexno, email, password, type) VALUES ('$fname', '$lname', '$indexno', '$email', '$password', '$type')";
		if(strlen($indexno)>5){
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index Number is too long.
			</div>';
		}
		else{
			$query_run = $connection->query($query);
			if($query_run){
				$new = '<div class="alert alert-success fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Done!</strong> Operator added successfully.
				</div>';
			} 
			else{
				$new = '<div class="alert alert-danger fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Sorry!</strong> Data are wrong.
				</div>';
			}
		}
	}
}
?>
<script>
function validate(){
	
	var fname = document.forms["form01"]["fname"].value;
	var lname = document.forms["form01"]["lname"].value;
	var indexno = document.forms["form01"]["indexno"].value;
	var email = document.forms["form01"]["email"].value;
	var password = document.forms["form01"]["password"].value;
	if(fname == "" || lname == "" || indexno == "" || email == "" || password == ""){
		alert("Please fill the fields!");
	}
}
</script>
<form method="POST" onsubmit="return validate()" name="form01"><!--form 1 start-->
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
			  <td id="newtd"><label for="inputFname" class="form-txt">First Name</label></td>
			  <td id="newtd"><input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Last Name</label></td>
			  <td id="newtd"><input type="text" name="lname" id="inputLname" class="form-control" placeholder="Last Name"></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Employee Id</label></td>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Employee Id"></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Email</label></td>
			  <td id="newtd"><input type="email" name="email" id="inputFname" class="form-control" placeholder="Email Address" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Password</label></td>
			  <td id="newtd"><input type="password" name="password" id="inputFname" class="form-control" placeholder="Password" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Add Operator</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->