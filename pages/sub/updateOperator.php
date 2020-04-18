<?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
$new = '';
if(isset($_POST['submit'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$indexno = $_POST['indexno'];
	
	if(!empty($fname)&&!empty($lname)&&!empty($email)){
		$query = "UPDATE admin SET fname='$fname', lname='$lname', email='$email' WHERE indexno='$indexno'";
		if(!(strlen($indexno)>5)){
			$query_run = $connection->query($query);
			if($query_run){
				$new = '<div class="alert alert-success fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Done!</strong> Operator updated successfully.
				</div>';
			}
			else{
				$new = '<div class="alert alert-danger fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Sorry!</strong> update was not complete.
				</div>';
			}
		}
		else{
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Employee Id is too long.
			</div>';
		}
	}
}
?>
<script>
function validate(){
	var inputIndex = document.getElementById("inputIndex").value;
	if(inputIndex == ""){
		alert("Please fill the field!");
	}
}

function validate2(){
	var inputFname = document.getElementById("inputFname").value;
	var inputLname = document.getElementById("inputLname").value;
	var email = document.getElementById("email").value;
	if(inputFname == "" || inputLname == "" || email == ""){
		alert("Please fill the fields!");
	}
}
</script>
<div class="row"><div class="col-xs-offset-2">
<form method="POST"><!--form 1 start-->
		<!--table start-->
		  <table class="table main"><tbody><tr><td id="newtd"></td><td id="newtd">
		  <ol class="breadcrumb2">
          <li class="breadcrumb-item">
            <a href="index.php">SM System</a>
          </li>
		  <li class="breadcrumb-item">
            <a href="index.php?p=addStudent">Update</a>
          </li>
          <li class="breadcrumb-item active"><?php
				echo ucfirst(substr($_GET['p'],0,6)).' '.substr($_GET['p'],6,20);
				?></li>
		  </ol></td></tr>
		  <tr><td id="newtd"></td><td id="newtd"><?php echo $new; ?></td></tr>
		  </tbody></table><!--table stop-->
		 </form></div></div><div class="row">
		 <div class="col-xs-offset-3 col-sm-6 col-sm-offset-8 col-md-5 col-md-offset-9">
<form action = "index.php?p=updateOperator" method="POST" onsubmit="return validate()"><!--form 1 start-->
		<!--table start-->
		  <table class="table"><tbody>
		    <tr>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Employee Id" autofocus></td>
			  <td id="newtd"><button class="btn btn-lg btn-success btn-block" name="search">Search</button></td>
			</tr>
			</tbody></table><!--table stop-->
		 </form></div></div>
		 
<?php
	if(isset($_POST['search'])&&isset($_POST['indexno'])){
	$search = $_POST['indexno'];
	if(!empty($search)){
		$search_q = "SELECT * FROM admin WHERE indexno='$search';";
		if(!(strlen($search)>5)){
			$query_s = $connection->query($search_q);
			$query_check = $query_s->num_rows;
			if($query_check > 0){
				$row=$query_s->fetch_array(MYSQLI_ASSOC);
				echo '
		  <form method="POST" onsubmit="return validate2()"><!--form 1 start-->
			<table class="table"><tbody>		 
				<tr>
				  <td id="newtd"><label for="inputFname" class="form-txt">First Name</label></td>
				  <td id="newtd"><input type="text" name="fname" id="inputFname" class="form-control" value="'.$row['fname'].'" autofocus></td>
				</tr>
				<tr>
				  <td id="newtd"><label for="inputLname" class="form-txt">Last Name</label></td>
				<td id="newtd"><input type="text" name="lname" id="inputLname" class="form-control" value="'.$row['lname'].'"></td>
				</tr>
				<tr>
				  <td id="newtd"><label for="inputIndex" class="form-txt">Employee Id</label></td>
				  <td id="newtd"><input readonly type="number" name="indexno" id="inputIndex" class="form-control" value="'.$row['indexno'].'" required></td>
				</tr>
				<tr>
				  <td id="newtd"><label for="inputIndex" class="form-txt">Email</label></td>
				  <td id="newtd"><input type="text" name="email" id="email" class="form-control" value="'.$row['email'].'"></td>
				</tr>
				<tr>
				  <td id="newtd"><label for="inputIndex" class="form-txt">Password</label></td>
				  <td id="newtd"><input readonly type="text" name="password" id="inputIndex" class="form-control" value="'.$row['password'].'" required></td>
				</tr>
				<tr>
				  <td id="newtd"></td>
				  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Operator</button></td>
				</tr>
			</tbody></table><!--table stop-->
		  </form>';
			}
			else{
				echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Sorry!</strong> Employee Id is wrong.
				</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Employee Id is too large.
			</div>';
		}
	}	
}
?>
		 