<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['scode'])&&isset($_POST['scredits'])&&isset($_POST['sname'])){
	$scode = $_POST['scode'];
	$scredits = $_POST['scredits'];
	$sname = $_POST['sname'];
	
	if(!empty($scode)&&!empty($scredits)&&!empty($sname)){
		$query = "INSERT INTO subject (scode, scredits, sname) VALUES ('$scode', '$scredits', '$sname')";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Subject added successfully.
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
	var scode = document.getElementById("scode").value;
	var scredits = document.getElementById("scredits").value;
	var sname = document.getElementById("sname").value;
	if(scode == "" || scredits == "" || sname == ""){
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
			  <td id="newtd"><label for="inputFname" class="form-txt">Subject Code</label></td>
			  <td id="newtd"> <input type="text" name="scode" id="scode" class="form-control" placeholder="Subject Code" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">No. of Credits</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="scredits" id="scredits" class="form-control">
				<option>0</option>
				<option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option> 
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Subject Name</label></td>
			  <td id="newtd"><input type="text" name="sname" id="sname" class="form-control" placeholder="Subject Name"></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Add Subject</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->