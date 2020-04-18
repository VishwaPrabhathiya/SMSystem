<div class="row col-xs-offset-2">
<table class="table main"><tbody><tr><td id="newtd"></td><td id="newtd">
		  <ol class="breadcrumb2">
          <li class="breadcrumb-item">
            <a href="index.php">SM System</a>
          </li>
		  <li class="breadcrumb-item active">Dashboard
          </li>
		  </ol></td></tr></tbody></table></div>
<div class="row col-xs-offset-2">
                <div class="col-sm-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									$dash_dat = "SELECT id FROM student;";
									$query_dat = $connection->query($dash_dat);
									$query_check = $query_dat->num_rows;
									echo $query_check;
									?>
									</div>
                                    <div>Total Students!</div>
                                </div>
                            </div>
                        </div>
<?php
if($_SESSION['type'] == 'admin'){
	echo '
						<a href="index.php?p=viewStudent">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
	';
}
?>
                        
                    </div>
                </div>
                <div class="col-sm-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									$dash_dat1 = "SELECT id FROM subject;";
									$query_dat1 = $connection->query($dash_dat1);
									$query_check1 = $query_dat1->num_rows;
									echo $query_check1;
									?>
									</div>
                                    <div>Total Subjects!</div>
                                </div>
                            </div>
                        </div>
<?php
if($_SESSION['type'] == 'admin'){
	echo '
                        <a href="index.php?p=viewSubject">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
	';
}
?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									$dash_dat2 = "SELECT id FROM course;";
									$query_dat2 = $connection->query($dash_dat2);
									$query_check2 = $query_dat2->num_rows;
									echo $query_check2;
									?>
									</div>
                                    <div>Total Courses!</div>
                                </div>
                            </div>
                        </div>
<?php
if($_SESSION['type'] == 'admin'){
	echo '
                        <a href="index.php?p=viewCourse">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
	';
}
?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-level-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									$dash_dat3 = "SELECT result FROM results WHERE result = 'A+';";
									$query_dat3 = $connection->query($dash_dat3);
									$query_check3 = $query_dat3->num_rows;
									echo $query_check3;
									?>
									</div>
                                    <div>Total A+ result Students!</div>
                                </div>
                            </div>
                        </div>
<?php
if($_SESSION['type'] == 'admin'){
	echo '
                        <a href="index.php?p=viewResult">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
	';
}
?>
                    </div>
                </div>
            </div>