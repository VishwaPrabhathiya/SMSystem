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
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
                    <div class="panel panel-light-green">
                        <div class="panel-heading">
                            Announcements
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-info fade in text-center" role="alert">
<?php
	$search_q = "SELECT * FROM notify WHERE id = (SELECT max(id) FROM notify)";
	$query_s = $connection->query($search_q);
	if($query_s){
		$row = $query_s->fetch_array(MYSQLI_ASSOC);
		echo '<strong>'.$row['message'].'</strong>';
	}
	else{
		echo '<strong>No messages at this time...</strong>';
	}
?>
							</div>
                        </div>
                    </div>
                </div></div>
                <div class="col-md-4">
                    <div class="panel panel-light-orange">
                        <div class="panel-heading">
                            Current GPA
                        </div>
                        <div class="panel-body">
                            <center><div style="font-size: 250%;">
<?php
$indexno = $_SESSION['indexno'];
$table_dat = "SELECT results.result,subject.scredits FROM results JOIN subject ON results.scode=subject.scode WHERE results.indexno='$indexno'";
$query_dat = $connection->query($table_dat);
if($query_dat){
	$scredits = [];
	$results = [];
	$totRcredits=0;
	$totScredits=0;
	$rows=$query_dat->num_rows;
	for($j=0;$j<$rows;$j++){
		$query_dat->data_seek($j);
		$row=$query_dat->fetch_array(MYSQLI_ASSOC);
		$scredits[$j] = $row['scredits'];
		$results[$j] = $row['result'];
		if($row['result'] == "A+"){
			$Rcredits = 4;
		}
		else if($row['result'] == "A"){
			$Rcredits = 4;
		}
		else if($row['result'] == "A-"){
			$Rcredits = 3.7;
		}
		else if($row['result'] == "B+"){
			$Rcredits = 3.3;
		}
		else if($row['result'] == "B"){
			$Rcredits = 3;
		}
		else if($row['result'] == "B-"){
			$Rcredits = 2.7;
		}
		else if($row['result'] == "C+"){
			$Rcredits = 2.3;
		}
		else if($row['result'] == "C"){
			$Rcredits = 2;
		}
		else if($row['result'] == "C-"){
			$Rcredits = 1.7;
		}
		else if($row['result'] == "D+"){
			$Rcredits = 1.3;
		}
		else if($row['result'] == "D"){
			$Rcredits = 1;
		}
		else {
			$Rcredits = 0;
		}
		$tempCredits = $Rcredits * $row['scredits'];
		$totRcredits = $tempCredits + $totRcredits;
		$totScredits = $row['scredits'] + $totScredits;
	}
	$gpa = $totRcredits / $totScredits;
	echo round($gpa, 2, PHP_ROUND_HALF_DOWN);
}
?>
							</div><center>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-light-yellow">
                        <div class="panel-heading">
                            Latest Results
                        </div>
                        <div class="panel-body">
							<div class="row">
<?php
	$indexno = $_SESSION['indexno'];
	$search_r = "SELECT * FROM results WHERE id=(SELECT max(id) FROM results WHERE indexno='$indexno')";
	$query_r = $connection->query($search_r);
	if($query_r){
		$row = $query_r->fetch_array(MYSQLI_ASSOC);
		$scode = $row['scode'];
		$search_sub = "SELECT * FROM subject WHERE scode='$scode'";
		$query_sub = $connection->query($search_sub);
		$row_sub = $query_sub->fetch_array(MYSQLI_ASSOC);
		echo '<div class="col-md-9 lead">'.$row_sub['sname'].'</div>';
		echo '<div class="col-md-3 lead">'.$row['result'].'</div>';
	}
	else{
		echo '<div class="col-md-12 lead">No results at this time...</div>';
	}
?>
							</div>
                        </div>
                    </div>
                </div>
            </div>