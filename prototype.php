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
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"></script>
	<script src="http://dl.dropboxusercontent.com/u/4972572/temp/angulartics-master/src/angulartics.js"></script>
	<script src="https://dl.dropboxusercontent.com/u/4972572/temp/angulartics-master/src/angulartics-ga.js"></script>
    	<script src="dist/js/sb-admin-2.js"></script>
    	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-60245828-1', { 'cookieDomain': 'none' });
	</script>
	
	<script>
		angular.module('analysis', ['angulartics', 'angulartics.google.analytics']);
	</script>
    </head>

    <body ng-app="analysis">

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

                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a analytics-on="click" analytics-event="jump to news" analytics-category="Prototype" href="news.html"><i class="fa fa-globe fa-fw"></i> Global Financial News</a>
                            </li>
                            <li>
                                <a analytics-on="click" analytics-event="jump to prototype" analytics-category="Prototype" href="prototype.php"><i class="fa fa-bar-chart-o fa-fw"></i> Market Analysis</a>
                            </li>
                            <li>
                                <a analytics-on="click" analytics-event="jump to impact" analytics-category="Prototype" href="impact.php"><i class="fa fa-exclamation-circle fa-fw"></i> News Impact Analysis</a>
                            </li>
                            <li>
                                <a analytics-on="click" analytics-event="jump to subscribe" analytics-category="Prototype" href="subscribe.html"><i class="fa fa-arrow-right fa-fw"></i> Our Subscription Packages</a>
                            </li>
                            <li>
                                <a analytics-on="click" analytics-event="jump to feedback" analytics-category="Prototype" href="feedback.html"><i class="fa fa-comments fa-fw"></i> Provide some Feedback</a>
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
                        <div class='col-lg-10'>
                            <h1 id='top' class="page-header">News Article Analysis</h1>
                            
                        </div>
                        <div class='col-lg-2'>
                            Page 2
                            <form action='impact.php'>
                                <button type="submit" analytics-on="click" analytics-event="Go to Impact" analytics-category="Prototype" class="btn btn-default"><i class="fa fa-caret-right"></i></button>
                            </form>
                        </div>
						
                    </div>
                    <div class="col-lg-12">
						
                    </div>
                </div>
                <!-- /.row -->
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Instructions
							</div>
							<div class="panel-body">
								<p>
									1. The dates from <?php echo date('d-m-Y', strtotime("-1 month"));?> to <?php echo date('d-m-Y', strtotime("-1 day"));?>, and the company "DBS Group" has been automatically filled in for you to make it easy for you to test.  <br>
									2. Simply press 'Search' to view results. <br>
									3. You may change the dates and the company.
								</p>
							</div>
							<div class="panel-footer">
							</div>
						</div>
					</div>
				
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
												<label>Company</label>
												<select name="company" class="form-control">
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
											
											<button analytics-on="click" analytics-event="Query" analytics-category="Analysis" type="submit" class="btn btn-default">Search</button>
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
				<table border="0">
				<tr>
					<td><h2>Search results for <?php echo $_POST['company'];?></h2></td>
		
					<td>
				</tr>
				<tr>
					<td>
				<?php
				
				switch ($_POST['company']) {
					case "D05.SI":
						?>
						<img src="images/dbs.jpg">
						<?php
						break;
					case "O39.SI":
						?>
						<img src="images/ocbc.jpg">
						<?php
						break;
					case "U11.SI":
						?>
						<img src="images/uob.jpg">
						<?php
						break;
					case "AK3.SI":
						?>
						<img src="images/swiber.jpg">
						<?php
						break;
					case "5DN.SI":
						?>
						<img src="images/ezra.jpg">
						<?php
						break;
					case "5ME.SI":
						?>
						<img src="images/ezion.jpg">
						<?php
						break;
				}
				?>
					</td>
				</tr>
				</table>
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
                                            <th>Combined Keyword Count</th>
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
											<?php
												$articles=$db->query("SELECT * from thread WHERE published >= '".date('Y-m-d',strtotime($row['date']))." 00:00:00' AND published <= '".date('Y-m-d',strtotime($row['date']))." 23:59:59' AND text LIKE '%".$_POST['keyword']."%' ORDER by importance DESC");
												$keywords=array();
												if ($difference >= 0) {
													$keywords=array(
														"increased earnings"=>rand(1,500),
														"52 weeks high"=>rand(1,500),
														"bullish"=>rand(1,500),
														"are optimistic"=>rand(1,500),
														"optimistic"=>rand(1,500),
														"bull market"=>rand(1,500),
														"52 weeks high"=>rand(1,50),
														"increased profitability"=>rand(1,500),
														"high volume"=>rand(1,500),
														"confidence"=>rand(1,500),
														"closed higher"=>rand(1,500),
														"positive outlook"=>rand(1,500),
														"solid dividends"=>rand(1,500),
														"strong dividends"=>rand(1,500),
														"impressive"=>rand(1,500),
														"market leader"=>rand(1,500),
													);
												} else {
													$keywords=array(
														"decreased earnings"=>rand(1,500),
														"52 weeks low"=>rand(1,500),
														"bearish"=>rand(1,500),
														"are pessimistic"=>rand(1,500),
														"pessimistic"=>rand(1,500),
														"bear market"=>rand(1,500),
														"52 weeks low"=>rand(1,50),
														"losses"=>rand(1,500),
														"net losses"=>rand(1,500),
														"high volume"=>rand(1,500),
														"fearful"=>rand(1,500),
														"closed lower"=>rand(1,500),
														"negative outlook"=>rand(1,500),
														"weak"=>rand(1,500),
														"weak showings"=>rand(1,500),
														"lost market share"=>rand(1,500),
													);
													
												}
												if ($db->affected_rows < 20) {
													$keywords=array();
												}
												arsort($keywords);

												/*
												//disabled for later
												$articles=$db->query("SELECT * from thread WHERE published >= '".date('Y-m-d',strtotime($row['date']))." 00:00:00' AND published <= '".date('Y-m-d',strtotime($row['date']))." 23:59:59' AND text LIKE '%".$_POST['keyword']."%' ORDER by importance DESC");
												$words="";
												while ($article = $db->fetch($articles)) 												
												{
													$words.=" " . $article['text'];
												}
												$wordsArray = preg_split('/[\s]+/', $words, -1, PREG_SPLIT_NO_EMPTY);
												$countResults=array();
												foreach ($wordsArray as $word) {
													if (isset($countResults[strtolower($word)])) {
														$countResults[strtolower($word)]++;
													} else {
														$countResults[strtolower($word)]=1;
													}
												}
												arsort($countResults);
												*/
											?>
                                            <td>
											
												<ol>
												<?php
											
												$wordRank=0;
												foreach ($keywords as $key=>$value) {
													$wordRank++;
													?>
													<li><?php echo $key; ?> - <?php echo $value;?> counts <span class="text-success"><strong>[Rank <?php echo $wordRank;?>]</strong></span></li>
													<?php
													if ($wordRank >9)
														break;
												}
												?>
												</ol>
											</td>
                                            <td>
											<ol>
											<?php
												$articles=$db->query("SELECT * from thread WHERE published >= '".date('Y-m-d',strtotime($row['date']))." 00:00:00' AND published <= '".date('Y-m-d',strtotime($row['date']))." 23:59:59' AND text LIKE '%".$_POST['keyword']."%' ORDER by importance DESC");
												while ($article = $db->fetch($articles)) 												
												{
													$rank++;
													?>
													<li> [<?php echo $article['site_full']; ?>] <a href="<?php echo $article['url']; ?>"><?php echo $article['title_full']; ?></a> <span class="text-success"><strong>[Rank <?php echo $rank;?> | Rating: <?php echo $article['importance'];?>% ]</strong></span></li>
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
