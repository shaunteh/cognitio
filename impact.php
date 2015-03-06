<?php
$stocks=array(
	"D05.SI"=>"DBS Group",
	"O39.SI"=>"OCBC Group",
	"U11.SI"=>"UOB Group",
	"AK3.SI"=>"Swiber",
	"5DN.SI"=>"Ezra",
	"5ME.SI"=>"Ezion"	
);


// I'm using a separate config file. so pull in those config values
require("include/config.inc.php");

// pull in the file with the database class
require("include/Database.singleton.php");

// create the $db singleton object
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

// connect to the server
$db->connect();
?>
<!DOCTYPE html>
<html lang="en" ng-app='newsApp' ng-strict-di>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cognitio - Knowledge for your future</title>

        <!-- Bootstrap Core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Navigation -->



        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="index.html">Cognitio</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                            <li><a href="subscribe.html"><i class="fa fa-plus-circle fa-fw"></i> Upgrade Plan</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="news.html"><i class="fa fa-hacker-news fa-fw"></i> News</a>
                            </li>
                            <li>
                                <a href="prototype.php"><i class="fa fa-bar-chart-o fa-fw"></i> Market Analysis</a>
                            </li>
                            <li>
                                <a href="impact.php"><i class="fa fa-bar-chart-o fa-fw"></i> News Impact Analysis</a>
                            </li>
                            <li>
                                <a href="feedback.html"><i class="fa fa-comments fa-fw"></i> Feedback</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 id='top' class="page-header">Impact Analysis</h1>
						
                    </div>
                    <div class="col-lg-12">
						
                    </div>
                </div>
                <!-- /.row -->
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Search Parameters
							</div>
							<div class="panel-body">

										<form role="form" method="POST">
											<div class="form-group">
												<label>Start Date</label>
												<input name="startdate" class="form-control" value="<?php echo date('d-m-Y', strtotime("-1 month"));?>">
											</div>
											<div class="form-group">
												<label>End Date</label>
												<input name="enddate" class="form-control" value="<?php echo date('d-m-Y', strtotime("-1 day"));?>">
											</div>
											<div class="form-group">
												<label>Industry</label>
												<select name="industry" class="form-control">
													<option value="">Please select an industry</option>
													<option value="1" <?php if ($_POST['industry']==1) echo "selected"; ?>>Singapore Banking Industry (DBS, UOB, OCBC)</option>
													<option value="2" <?php if ($_POST['industry']==2) echo "selected"; ?>>Singapore Oil Industry (Ezra, Ezion, Swiber)</option>
												</select>
											</div>
											
											<button type="submit" class="btn btn-default">Search</button>
										</form>
							 <!-- /.row (nested) -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-16 -->
				</div>
				<!-- /.row -->
				<?php
				//If this is a POST
				if (isset($_POST['industry']) && strlen($_POST['industry']) > 0) {
					$companies=array();
					if ($_POST['industry']==1) {
						array_push($companies,"D05.SI");
						array_push($companies,"O39.SI");
						array_push($companies,"U11.SI");
					} else {
						array_push($companies,"AK3.SI");
						array_push($companies,"5DN.SI");
						array_push($companies,"5ME.SI");
					}
				?>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Stock Symbol</th>
                                            <th><?php echo date("d F Y, l",strtotime($_POST['startdate'])); ?></th>
                                            <th><?php echo date("d F Y, l",strtotime($_POST['enddate'])); ?></th>
                                            <th width="113">Ending Difference</th>
                                            <th>News Articles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
										<?php
										foreach ($companies as $company) {
											$first_price=$db->query_first("SELECT * FROM prices WHERE symbol='".$company."' AND date = '".date('Y-m-d',strtotime($_POST['startdate']))."'");;
											$second_price=$db->query_first("SELECT * FROM prices WHERE symbol='".$company."' AND date = '".date('Y-m-d',strtotime($_POST['enddate']))."'");
											$percentage=round(($first_price['close']-$second_price['close'])/$second_price['close'],3);
											$difference=round($second_price['close']-$first_price['close'],3);
											$articles=$db->query("SELECT * from thread WHERE symbol='".$company."' AND published >= '".date('Y-m-d',strtotime($_POST['startdate']))." 00:00:00' AND published <= '".date('Y-m-d',strtotime($_POST['enddate']))." 23:59:59' ORDER by importance DESC LIMIT 10");
											?>
											<tr>
												<td><?php echo $stocks[$company]; ?></td>
												<td><?php echo $company; ?></td>
												<td><?php echo $first_price['close']; ?></td>
												<td><?php echo $second_price['close']; ?></td>
												<td>
													<?php 
														if ($difference >= 0) {
														?>
															<div class="alert alert-success"> <?php echo $difference;?><br> (<p class="fa fa-long-arrow-down"> <?php echo $percentage; ?>%</p>)</div>
														<?php
														} else {
															?>
															<div class="alert alert-danger"> <?php echo $difference;?><br>(<p class="fa fa-long-arrow-up"> <?php echo $percentage; ?>%</p>)</div>
															<?php
														}
													?>
												</td>
												<td>
												<ol>
												<?php
													$rank=0;
													while ($article = $db->fetch($articles)) {
														$rank++;
														?>
															<li> [<?php echo $article['site_full']; ?>] <a href="<?php echo $article['url']; ?>"><?php echo $article['title_full']; ?></a> <span class="text-success"><strong>[Rank <?php echo $rank;?> | Rating: <?php echo $article['importance'];?>% ]</strong></p></li>
														
														<?php
													}
												?>
												</ol>
												</td>
											</tr>
											<?php
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					
					</div>
				</div>
				<!-- /.row -->
				<?php
				} //end of if (isset($_POST['startdate'])) {
				?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


        <!-- jQuery -->
        <div class="col-lg-10">
            <p class="pull-right">
                <a href="#top">Back to Top</a>
            </p>
        </div>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="bower_components/raphael/raphael-min.js"></script>
        <script src="bower_components/morrisjs/morris.min.js"></script>
        <script src="js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>



    </body>

</html>
<?php
$db->close();
?>
