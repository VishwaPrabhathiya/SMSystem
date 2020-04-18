<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['cname'])&&isset($_POST['noofyear'])&&isset($_POST['noofsub'])&&isset($_POST['noofcred'])){
	$cname = $_POST['cname'];
	$noofyear = $_POST['noofyear'];
	$noofsub = $_POST['noofsub'];
	$noofcred = $_POST['noofcred'];
	
	if(!empty($cname)&&!empty($noofyear)&&!empty($noofsub)&&!empty($noofcred)){
		$query = "INSERT INTO course (cname, noofyear, noofsub, noofcred) VALUES ('$cname', '$noofyear', '$noofsub', '$noofcred')";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Result added successfully.
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
?>
<script>
function validate(){
	var cname = document.getElementById("cname").value;
	var noofyear = document.getElementById("noofyear").value;
	var noofsub = document.getElementById("noofsub").value;
	var noofcred = document.getElementById("noofcred").value;
	if(cname == "" || noofyear == "" || noofsub == "" || noofcred == ""){
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
			  <td id="newtd"><label for="inputIndex" class="form-txt">Course Name</label></td>
			  <td id="newtd"><input type="text" name="cname" id="cname" class="form-control" placeholder="Course Name" autofocus></td>
			</tr>
		    <tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">No. of Years</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="noofyear" id="noofyear" class="form-control">
                <option>3</option>
                <option>4</option> 
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">No. of Subjects</label></td>
			  <td id="newtd"><input type="number" name="noofsub" id="noofsub" class="form-control" placeholder="No. of Subjects"></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">No. of Credits</label></td>
			  <td id="newtd"><input type="text" name="noofcred" id="noofcred" class="form-control" placeholder="No. of Credits"></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Add Course</button>
			  </td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->