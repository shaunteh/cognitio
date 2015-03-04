<?php
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
                                <a href="prototype.html"><i class="fa fa-bar-chart-o fa-fw"></i> Market Analysis</a>
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
                        <h1 id='top' class="page-header">News Article Analysis</h1>
						
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
												<input name="enddate" class="form-control" value="<?php echo date('d-m-Y');?>">
											</div>
											<div class="form-group">
												<label>Company</label>
												<select name="company" class="form-control">
													<option value="">Please select a company</option>
													<option value="D05.SI" <?php if ($_POST['company'] == "D05.SI") echo "selected"; ?>>DBS Group</option>
													<option value="O39.SI" <?php if ($_POST['company'] == "O39.SI") echo "selected"; ?>>OCBC Group</option>
													<option value="U11.SI" <?php if ($_POST['company'] == "U11.SI") echo "selected"; ?>>UOB Group</option>
													<option value="AK3.SI" <?php if ($_POST['company'] == "AK3.SI") echo "selected"; ?>>Swiber</option>
													<option value="5DN.SI" <?php if ($_POST['company'] == "5DN.SI") echo "selected"; ?>>Ezra</option>
													<option value="5ME.SI" <?php if ($_POST['company'] == "5ME.SI") echo "selected"; ?>>Ezion Holdings</option>
												</select>
											</div>
											<div class="form-group">
												<label>Enter Keyword(s)</label>
												<input name="keyword" class="form-control" placeholder="Enter keywords" value="<?php echo $_POST['keyword'];?>">
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
				if (isset($_POST['company']) && strlen($_POST['company'])) {
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
                                            <th>Date</th>
                                            <th>Open</th>
                                            <th>Close</th>
                                            <th width="120">Difference</th>
                                            <th>Volume (K)</th>
                                            <th>Keyword Count</th>
                                            <th>News Articles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$rows=$db->query("SELECT * FROM prices WHERE symbol='".$_POST['company']."' AND date <= '".date('Y-m-d',strtotime($_POST['enddate']))."' and date>= '".date('Y-m-d',strtotime($_POST['startdate']))."' ORDER by date DESC");
										while ($row = $db->fetch($rows)) 
										{
										?>
                                        <tr>
                                            <td><?php echo date('Y-m-d',strtotime($row['date']));?></td>
                                            <td>S$<?php echo $row['open'];?></td>
                                            <td>S$<?php echo $row['close'];?></td>
                                            <td>
												<strong>
												<?php 
												$percentage=round(($row['close']-$row['open'])/$row['open'],3);
												$difference=round($row['close']-$row['open'],2);
												
												if ($difference >= 0) {
													?>
													<div class="alert alert-success"> <?php echo $difference;?> <br> (<p class="fa fa-long-arrow-up"> <?php echo $percentage; ?>%</p>)</div>
													<?php
												} else {
													?>
													<div class="alert alert-danger"> <?php echo $difference;?> <br> (<p class="fa fa-long-arrow-down"> <?php echo $percentage; ?>%</p>)</div>
													<?php
												}
												?>
												</strong>
											</td>
                                            <td><?php echo $row['volume'];?></td>
                                            <td></td>
                                            <td>
											<ol>
											<?php
												$articles=$db->query("SELECT * from thread WHERE published >= '".date('Y-m-d',strtotime($row['date']))." 00:00:00' AND published <= '".date('Y-m-d',strtotime($row['date']))." 23:59:59' AND text LIKE '%".$_POST['keyword']."%' ORDER by importance DESC");
												$rank=0;
												while ($article = $db->fetch($articles)) 												
												{
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
