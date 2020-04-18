<?php
if(!($_SESSION['type'] == 'admin')){
	include($pages_dir.'/'.'pageError.php');
	exit();
}
?>
<div class="row">
<div class="col-xs-offset-2">
		<!--table start-->
	<table class="table main"><tbody><tr><td id="newtd"></td><td id="newtd">
		<ol class="breadcrumb2">
        <li class="breadcrumb-item">
        <a href="index.php">SM System</a>
        </li>
		<li class="breadcrumb-item">
        <a href="index.php?p=addStudent">View</a>
        </li>
        <li class="breadcrumb-item active"><?php
			echo ucfirst(substr($_GET['p'],0,4)).' '.substr($_GET['p'],4,20);
			?></li>
		</ol></td></tr>
		</tbody>
	</table><!--table stop-->
</div></div>
<div class="row">
	<div class="col-sm-11 col-sm-offset-1  col-xs-offset-3 col-xs-9 col-md-12">
		<h2 class="sub-header">Results of Students'</h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Index no.</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>Subject Code</th>
				  <th>Result</th>
                </tr>
              </thead>
              <tbody>
                <?php
					$table_dat = "SELECT * FROM results ORDER BY id ASC;";
					$query_dat = $connection->query($table_dat);
					$query_check = $query_dat->num_rows;
					if($query_check > 0){
						for($j=0;$j<$query_check;$j++){
							$query_dat->data_seek($j);
							$row=$query_dat->fetch_array(MYSQLI_ASSOC);
							echo '
								<tr>
									<td>'.($j+1).'</td>
									<td>'.$row['indexno'].'</td>
									<td>'.$row['year'].'</td>
									<td>'.$row['sem'].'</td>
									<td>'.$row['scode'].'</td>
									<td>'.$row['result'].'</td>
								</tr>';
						}
					}
					else{
						die(mysql_error());
					}
				?>
              </tbody>
            </table>
        </div>
	</div>
</div>