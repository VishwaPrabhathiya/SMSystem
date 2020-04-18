<?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
$new = '';
if(isset($_POST['indexno'])&&isset($_POST['year'])&&isset($_POST['sem'])&&isset($_POST['scode'])&&isset($_POST['result'])){
	$indexno = $_POST['indexno'];
	$year = $_POST['year'];
	$sem = $_POST['sem'];
	$scode = $_POST['scode'];
	$result = $_POST['result'];
	
	if(!empty(indexno)&&!empty($year)&&!empty($sem)&&!empty($scode)&&!empty($result)&&!(strlen($indexno)>5)){
		$query = "UPDATE results SET year='$year', sem='$sem', result='$result' WHERE indexno='$indexno' AND scode='$scode'";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Result updated successfully.
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
	else{
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Charactors are too long.
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
<form action = "index.php?p=updateResult" method="POST"><!--form 1 start-->
		<!--table start-->
		  <table class="table"><tbody>
		    <tr>
			  <td id="newtd"><input type="number" name="indexno" id="inputIndex" class="form-control" placeholder="Index No" required autofocus></td>
			  <td id="newtd"><input type="txt" name="scode" id="inputIndex" class="form-control" placeholder="Subject Code" required autofocus></td>
			  <td id="newtd"><button class="btn btn-lg btn-success btn-block" name="search">Search</button></td>
			</tr>
			</tbody></table><!--table stop-->
		 </form></div></div>
		 
<?php
	if(isset($_POST['search'])&&isset($_POST['indexno'])&&isset($_POST['scode'])){
	$search_i = $_POST['indexno'];
	$search_s = $_POST['scode'];
	if(!empty($search_i)&&!empty($search_s)&&!(strlen($search_i)>5)){
		$search_q = "SELECT * FROM results WHERE indexno='$search_i' AND scode='$search_s';";
		$query_s = $connection->query($search_q);
		$query_check = $query_s->num_rows;
		if($query_check > 0){
			$row=$query_s->fetch_array(MYSQLI_ASSOC);
			echo '
	  <form method="POST"><!--form 1 start-->
		<table class="table"><tbody>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Index No</label></td>
			  <td id="newtd"><input readonly type="number" name="indexno" id="inputIndex" class="form-control" value="'.$row['indexno'].'" required></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Year</label></td>
			  <td id="newtd"><input type="text" name="year" id="inputFname" class="form-control" value="'.$row['year'].'" required autofocus></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputLname" class="form-txt">Semester</label></td>
			<td id="newtd">
			  <div class="form-group">
			  <select name="sem" value="'.$row['sem'].'" class="form-control">
				<option value="1" ';
				if(($row['sem'])=="1"){ echo 'selected';}
				echo '>1</option>
                <option value="2" ';
				if(($row['sem'])=="2"){ echo 'selected';}
				echo '>2</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputIndex" class="form-txt">Subject Code</label></td>
			  <td id="newtd"><input readonly type="text" name="scode" id="inputIndex" class="form-control" value="'.$row['scode'].'" required></td>
			</tr>
			<tr>
			  <td id="newtd"><label for="inputEmail" class="form-txt">Result</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="result" value="'.$row['result'].'" class="form-control">
				<option value="A+" ';
				if(($row['result'])=="A+"){ echo 'selected';}
				echo '>A+</option>
                <option value="A" ';
				if(($row['result'])=="A"){ echo 'selected';}
				echo '>A</option>
				<option value="A-" ';
				if(($row['result'])=="A-"){ echo 'selected';}
				echo '>A-</option>
                <option value="B+" ';
				if(($row['result'])=="B+"){ echo 'selected';}
				echo '>B+</option>
				<option value="B" ';
				if(($row['result'])=="B"){ echo 'selected';}
				echo '>B</option>
				<option value="B-" ';
				if(($row['result'])=="B-"){ echo 'selected';}
				echo '>B-</option>
                <option value="C+" ';
				if(($row['result'])=="C+"){ echo 'selected';}
				echo '>C+</option>
				<option value="C" ';
				if(($row['result'])=="C"){ echo 'selected';}
				echo '>C</option>
                <option value="C-" ';
				if(($row['result'])=="C-"){ echo 'selected';}
				echo '>C-</option>
				<option value="S+" ';
				if(($row['result'])=="S+"){ echo 'selected';}
				echo '>S+</option>
				<option value="S" ';
				if(($row['result'])=="S"){ echo 'selected';}
				echo '>S</option>
                <option value="S-" ';
				if(($row['result'])=="S-"){ echo 'selected';}
				echo '>S-</option>
				<option value="F" ';
				if(($row['result'])=="F"){ echo 'selected';}
				echo '>F</option>
			  </select>
			  </div>
			  </td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Result</button></td>
			</tr>
		</tbody></table><!--table stop-->
	  </form>';
		}
		else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Index no. or Subject code is wrong.
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
		 