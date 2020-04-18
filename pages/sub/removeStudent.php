<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['indexno'])){
	$indexno = $_POST['indexno'];
	
	if(!empty($indexno)){
		$query = "DELETE FROM student WHERE indexno = '$indexno'";
		if(!(strlen($indexno)>5)){
			$query_run = $connection->query($query);
			if($query_run){
				$new = '<div class="alert alert-success fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Done!</strong> Student removed successfully.
				</div>';
			}
			else{
				$new = '<div class="alert alert-danger fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
				</button>
				<strong>Sorry!</strong> Index no. is wrong.
				</div>';
			}
		}
		else{
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. is too long.
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
</script>
<form method="POST" onsubmit="return validate()"><!--form 1 start-->
		<!--table start-->
		  <table class="table main"><tbody><tr><td id="newtd"></td><td id="newtd">
		  <ol class="breadcrumb2">
          <li class="breadcrumb-item">
            <a href="index.php">SM System</a>
          </li>
		  <li class="breadcrumb-item">
            <a href="index.php?p=removeStudent">Remove</a>
          </li>
          <li class="breadcrumb-item active"><?php
				echo ucfirst(substr($_GET['p'],0,6)).' '.substr($_GET['p'],6,20);
				?></li>
		  </ol></td></tr>
		  <tr><td id="newtd"></td><td id="newtd"><?php echo $new; ?></td></tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Index No</label></td>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No"></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Remove Student</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->