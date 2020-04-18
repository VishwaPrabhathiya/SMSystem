<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['indexno'])&&isset($_POST['year'])&&isset($_POST['sem'])&&isset($_POST['scode'])&&isset($_POST['result'])){
	$indexno = $_POST['indexno'];
	$year = $_POST['year'];
	$sem = $_POST['sem'];
	$scode = $_POST['scode'];
	$result = $_POST['result'];
	
	if(!empty($indexno)&&!empty($year)&&!empty($sem)&&!empty($scode)&&!empty($result)){
		$query = "INSERT INTO results (indexno, year, sem, scode, result) VALUES ('$indexno', '$year', '$sem', '$scode', '$result')";
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
}
?>
<script>
function validate(){
	var inputIndex = document.getElementById("inputIndex").value;
	var year = document.getElementById("year").value;
	var sem = document.getElementById("sem").value;
	var scode = document.getElementById("scode").value;
	var result = document.getElementById("result").value;
	if(inputIndex == "" || year == "" || sem == "" || scode == "" || result == ""){
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
			  <td id="newtd"><label for="inputIndex" class="form-txt">Index No</label></td>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No" autofocus></td>
			</tr>
		    <tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Year</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="year" id="year" class="form-control">
				<option>2017</option>
                <option>2018</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Semester</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="sem" id="sem" class="form-control">
				<option>1</option>
                <option>2</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Subject Code</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="scode" id="scode" class="form-control">
				  <?php
				  $sql = "SELECT scode from subject";
				  $result = $connection->query($sql);
				  $rows=$result->num_rows;
				  for($j=0;$j<$rows;$j++){
					  $result->data_seek($j);
					  $row=$result->fetch_array(MYSQLI_ASSOC);
					  echo '<option value="'.$row['scode'].'">'.$row['scode'].'</option>';
				  }
				  ?>
				  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputEmail" class="form-txt">Result</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="result" id="result" class="form-control">
				<option>A+</option>
                <option>A</option>
				<option>A-</option>
				<option>B+</option>
                <option>B</option>
				<option>B-</option>
				<option>C+</option>
                <option>C</option>
				<option>C-</option>
				<option>D+</option>
                <option>D</option>
				<option>E</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Add Result</button></td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->