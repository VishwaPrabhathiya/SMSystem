<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['submit'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['gender'])&&isset($_POST['cname'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$indexno = $_POST['indexno'];
	$cname = $_POST['cname'];
	
	if(!empty($fname)&&!empty($lname)&&!empty($gender)&&!empty($cname)&&!(strlen($indexno)>5)){
		$query = "UPDATE student SET fname='$fname', lname='$lname', gender='$gender', cname='$cname' WHERE indexno='$indexno'";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Student updated successfully.
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
			<strong>Sorry!</strong> Index no. is too long.
			</div>';
	}

}
?>
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
<form action = "index.php?p=updateStudent" method="POST"><!--form 1 start-->
		<!--table start-->
		  <table class="table"><tbody>
		    <tr>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No" required autofocus></td>
			  <td id="newtd"><button class="btn btn-lg btn-success btn-block" name="search">Search</button></td>
			</tr>
			</tbody></table><!--table stop-->
		 </form></div></div>
		 
<?php
	if(isset($_POST['search'])&&isset($_POST['indexno'])){
	$search = $_POST['indexno'];
	if(!empty($search)&&!(strlen($search)>5)){
		$search_q = "SELECT * FROM student WHERE indexno='$search';";
		$query_s = $connection->query($search_q);
		$query_check = $query_s->num_rows;
		if($query_check > 0){
			$row=$query_s->fetch_array(MYSQLI_ASSOC);
			echo '
	  <form method="POST"><!--form 1 start-->
		<table class="table"><tbody>		 
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">First Name</label></td>
			  <td id="newtd"><input type="text" name="fname" id="inputFname" class="form-control" value="'.$row['fname'].'" required autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Last Name</label></td>
			<td id="newtd"><input type="text" name="lname" id="inputLname" class="form-control" value="'.$row['lname'].'" required></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Gender</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="gender" value="'.$row['gender'].'" class="form-control">
				<option value="Male" ';
				if(($row['gender'])=="Male"){ echo 'selected';}
				echo '>Male</option>
                <option value="Female" ';
				if(($row['gender'])=="Female"){ echo 'selected';}
				echo '>Female</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Index No</label></td>
			  <td id="newtd"><input readonly type="number" name="indexno" id="inputIndex" class="form-control" value="'.$row['indexno'].'" required></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputEmail" class="form-txt">Course</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="cname" class="form-control">';
				  $sql = "SELECT cname from course";
				  $result_c = $connection->query($sql);
				  $rows=$result_c->num_rows;
				  for($j=0;$j<$rows;$j++){
					  $result_c->data_seek($j);
					  $row_c=$result_c->fetch_array(MYSQLI_ASSOC);
					  echo '<option value="'.$row_c['cname'].'" ';
					  if(($row['cname'])==$row_c['cname']){ echo 'selected';}
					  echo '>'.$row_c['cname'].'</option>';
				  }
				  echo '</select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Student</button></td>
			</tr>
		</tbody></table><!--table stop-->
	  </form>';
		}
		else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. is wrong.
			</div>';
		}
	}
	else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. is too large.
			</div>';
	}	
}
?>
		 