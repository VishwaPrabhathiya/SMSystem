<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['gender'])&&isset($_POST['indexno'])&&isset($_POST['cname'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$indexno = $_POST['indexno'];
	$cname = $_POST['cname'];
	
	if(!empty($fname)&&!empty($lname)&&!empty($gender)&&!empty($indexno)&&!empty($cname)){
		$query = "INSERT INTO student (fname, lname, gender, indexno, cname) VALUES ('$fname', '$lname', '$gender', '$indexno', '$cname')";
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
				<strong>Done!</strong> Student added successfully.
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
	var inputFname = document.getElementById("inputFname").value;
	var inputLname = document.getElementById("inputLname").value;
	var gender = document.getElementById("gender").value;
	var inputIndex = document.getElementById("inputIndex").value;
	var cname = document.getElementById("cname").value;
	if(inputFname == "" || inputLname == "" || gender == "" || inputIndex == "" || cname == ""){
		alert("Please fill the fields!");
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
			  <td id="newtd"><label for="inputFname" class="form-txt">First Name</label></td>
			  <td id="newtd"><input type="text" name="fname" id="inputFname" class="form-control" placeholder="First Name" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Last Name</label></td>
			  <td id="newtd"><input type="text" name="lname" id="inputLname" class="form-control" placeholder="Last Name"></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Gender</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="gender" id="gender" class="form-control">
				<option>Male</option>
                <option>Female</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Index No</label></td>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No"></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputEmail" class="form-txt">Course</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="cname" id="cname" class="form-control">
				  <?php
				  $sql = "SELECT cname from course";
				  $result = $connection->query($sql);
				  $rows=$result->num_rows;
				  for($j=0;$j<$rows;$j++){
					  $result->data_seek($j);
					  $row=$result->fetch_array(MYSQLI_ASSOC);
					  echo '<option value="'.$row['cname'].'">'.$row['cname'].'</option>';
				  }
				  ?>
				  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Add Student</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->