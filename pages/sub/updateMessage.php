<?php
if(!($_SESSION['type'] == 'admin')){
	if(!($_SESSION['type'] == 'operator')){
		include($pages_dir.'/'.'pageError.php');
		exit();
	}
}
$new = '';
if(isset($_POST['submit'])&&isset($_POST['message'])&&isset($_POST['id'])){
	$message = $_POST['message'];
	$id = $_POST['id'];
	
	if(!empty($message)){
		$query = "UPDATE notify SET message='$message' WHERE id='$id'";
		$query_run = $connection->query($query);
		if($query_run){
			$new = '<div class="alert alert-success fade in text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Done!</strong> Message updated successfully.
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
	var inputFname = document.getElementById("inputFname").value;
	if(inputFname == ""){
		alert("Message is empty!");
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
		 </form></div></div>
		 
<?php
		$search_q = "SELECT * FROM notify WHERE id = (SELECT max(id) FROM notify)";
		$query_s = $connection->query($search_q);
		$query_check = $query_s->num_rows;
		if($query_check > 0){
			$row=$query_s->fetch_array(MYSQLI_ASSOC);
			echo '
	  <form method="POST" onsubmit="return validate()"><!--form 1 start-->
		<table class="table"><tbody>		 
			<tr>
			  <td id="newtd"><label for="inputFname" class="form-txt">Message</label></td>
			  <td id="newtd"><input type="text" name="message" rows="5" id="inputFname" class="form-control" value="'.$row['message'].'" autofocus></td>
			</tr>
			<tr class="hidden">
			  <td id="newtd"></td>
			  <td id="newtd"><input type="text" name="id" id="inputFname" class="form-control" value="'.$row['id'].'"></td>
			</tr>
			<tr>
			  <td id="newtd"></td>
			  <td id="newtd"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Message</button></td>
			</tr>
		</tbody></table><!--table stop-->
	  </form>';
		}
		else{
			echo '<div class="alert alert-danger fade in text-center col-xs-offset-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			<span class="glyphicon glyphicon-remove"></span>
			</button>
			<strong>Sorry!</strong> No messages sent yet.
			</div>';
		}
?>
		 