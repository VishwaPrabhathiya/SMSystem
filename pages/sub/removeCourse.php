<?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
$new = '';
if(isset($_POST['cname'])){
	$cname = $_POST['cname'];
	
	if(!empty($cname)){
		$query = "DELETE FROM course WHERE cname = '$cname'";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Course removed successfully.
			</div>';
		}
		else{
			$new = '<div class="alert alert-danger fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> Course name is wrong.
			</div>';
		}
	}
}
?>
<form method="POST"><!--form 1 start-->
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
			  <td id="newtd"><label for="inputIndex" class="form-txt">Course Name</label></td>
			  <td id="newtd">
			  <div class="form-group">
			  <select name="cname" class="form-control">
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
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit">Remove Course</button>
			  </td>
			</tr>
		  </tbody></table><!--table stop-->
		 </form><!--form 1 stop-->