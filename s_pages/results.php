<?php
if(!($_SESSION['type'] == 'student')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
?>
<div class="col-xs-offset-2 col-sm-offset-1 col-md-12 col-sm-12">
	<div class="panelmain">
                <div class="col-md-12">
				<ol class="breadcrumb2">
					<li class="breadcrumb-item">
						<a href="student.php">SM System</a>
					</li>
					<li class="breadcrumb-item active">Profile</li>
				</ol>
<div class="row">
	<div class="col-xs-offset-1">
<?php
					$indexno = $_SESSION['indexno'];
					$table_dat = "SELECT results.year,results.sem,results.result,subject.sname FROM results JOIN subject ON results.scode=subject.scode WHERE results.indexno='$indexno'";
					$query_dat = $connection->query($table_dat);
					$id = 1;
					if($query_dat){
					echo '
		<h2 class="sub-header">Total Results</h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Subject Name</th>
                  <th>Year</th>
                  <th>Semester</th>
				  <th>Result</th>
                </tr>
              </thead>
              <tbody>';
						$rows=$query_dat->num_rows;
						for($j=0;$j<$rows;$j++){
							$query_dat->data_seek($j);
							$row=$query_dat->fetch_array(MYSQLI_ASSOC);
							echo '
								<tr>
									<td>'.$id++.'</td>
									<td>'.$row['sname'].'</td>
									<td>'.$row['year'].'</td>
									<td>'.$row['sem'].'</td>
									<td>'.$row['result'].'</td>
								</tr>';
						}
						echo '
              </tbody>
            </table>
        </div>';
					}
					else{
						echo '<h3 class="sub-header">No results at this time...</h3>';
					}

?>
	 </div>
</div>