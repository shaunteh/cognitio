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
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li><a href="subscribe.html"><i class="fa fa-plus-circle fa-fw"></i> Upgrade Plan</a>
                            </li>
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
                                <a href="#"><i class="fa fa-book fa-fw"></i> Money Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"> CPF</a>
                                    </li>
                                    <li>
                                        <a href="#"> Budgeting</a>
                                    </li>
                                    <li>
                                        <a href="#"> Credit Management</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Investment Corner<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"> Bonds</a>
                                    </li>
                                    <li>
                                        <a href="#"> Stocks</a>
                                    </li>
                                    <li>
                                        <a href="#"> Unit Trusts</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="floor.html"><i class="fa fa-dollar fa-fw"></i> Trading Floor</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wechat fa-fw"></i> Forum</a>
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

										<form role="form">
											<div class="form-group">
												<label>Start Date</label>
												<input name="startdate" class="form-control" placeholder="Enter start date (eg: 20-02-2015)">
											</div>
											<div class="form-group">
												<label>End Date</label>
												<input name="enddate" class="form-control" placeholder="Enter end date (eg: 28-02-2015)">
											</div>
											<div class="form-group">
												<label>Company</label>
												<select name="company" class="form-control">
													<option value="D05.SI">DBS Group Pte Ltd</option>
												</select>
											</div>
											<div class="form-group">
												<label>Enter Keyword(s)</label>
												<input name="keyword" class="form-control" placeholder="Enter keywords">
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
                                            <th>Volume (K)</th>
                                            <th>Strongest Keyword(s)</th>
                                            <th>News Articles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>27-02-2015</td>
                                            <td>19.57</td>
                                            <td>19.57</td>
                                            <td>5060.6</td>
                                            <td></td>
                                            <td>
												<?php
												?>
											</td>
                                        </tr>                                        
										<tr>
                                            <td>26-02-2015</td>
                                            <td>19.76</td>
                                            <td>19.69</td>
                                            <td>3167.2</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>25-02-2015</td>
                                            <td>19.83</td>
                                            <td>19.82</td>
                                            <td>3441.5</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>24-02-2015</td>
                                            <td>19.78</td>
                                            <td>19.77</td>
                                            <td>4133.1</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>23-02-2015</td>
                                            <td>19.95</td>
                                            <td>19.65</td>
                                            <td>5817.7</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					
					</div>
				</div>
				<!-- /.row -->
				
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
