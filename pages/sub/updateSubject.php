<?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
$new = '';
if(isset($_POST['submit'])&&isset($_POST['scode'])&&isset($_POST['scredits'])&&isset($_POST['sname'])){
	$scode = $_POST['scode'];
	$scredits = $_POST['scredits'];
	$sname = $_POST['sname'];
	
	if(!empty($scode)&&!empty($scredits)&&!empty($sname)){
		$query = "UPDATE subject SET scode='$scode', scredits='$scredits', sname='$sname' WHERE scode='$scode'";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Subject updated successfully.
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

}
?>
<script>
function validate(){
	var scode = document.getElementById("scode").value;
	if(scode == ""){
		alert("Subject Code is empty!");
	}
}

function validate2(){
	var sname = document.getElementById("sname").value;
	if(sname == ""){
		alert("Please fill the field!");
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
<form action = "index.php?p=updateSubject" method="POST" onsubmit="return validate()"><!--form 1 start-->
		<!--table start-->
		  <table class="table"><tbody>
		    <tr>
			  <td id="newtd"><input type="text" name="scode" id="scode" class="form-control" placeholder="Subject Code" autofocus></td>
			  <td id="newtd"><button class="btn btn-lg btn-success btn-block" name="search">Search</button></td>
			</tr>
			</tbody></table><!--table stop-->
		 </form></div></div>
		 
<?php
	if(isset($_POST['search'])&&isset($_POST['scode'])){
	$search = $_POST['scode'];
	if(!empty($search)){
		$search_q = "SELECT * FROM subject WHERE scode='$search';";
		$query_s = $connection->query($search_q);
		$query_check = $query_s->num_rows;
		if($query_check > 0){
			$row=$query_s->fetch_array(MYSQLI_ASSOC);
			echo '
	  <form method="POST" onsubmit="return validate2()"><!--form 1 start-->
		<table class="table"><tbody>		 
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Subject Code</label></td>
			  <td id="newtd"><input readonly type="text" name="scode" id="inputIndex" class="form-control" value="'.$row['scode'].'" required></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">No. of Credits</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="scredits" id="scredits" value="'.$row['scredits'].'" class="form-control">
				<option value="0" ';
				if(($row['scredits'])=="0"){ echo 'selected';}
				echo '>0</option>
                <option value="1" ';
				if(($row['scredits'])=="1"){ echo 'selected';}
				echo '>1</option>
				<option value="2" ';
				if(($row['scredits'])=="2"){ echo 'selected';}
				echo '>2</option>
                <option value="3" ';
				if(($row['scredits'])=="3"){ echo 'selected';}
				echo '>3</option>
				<option value="4" ';
				if(($row['scredits'])=="4"){ echo 'selected';}
				echo '>4</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Subject Name</label></td>
			  <td id="newtd"><input type="text" name="sname" id="sname" class="form-control" value="'.$row['sname'].'" autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Subject</button></td>
			</tr>
		</tbody></table><!--table stop-->
	  </form>';
		}
		else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Subject code is wrong.
			</div>';
		}
	}
}
?>
		 