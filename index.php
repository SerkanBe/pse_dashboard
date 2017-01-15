<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EIA Dashboard</title>

    <!-- jQuery -->
    <script type="application/javascript" src="../vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="application/javascript" src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NoUISlider -->
    <link href="../vendors/nouislider/css/nouislider.min.css" rel="stylesheet">
    <script type="application/javascript" src="../vendors/nouislider/js/nouislider.min.js"></script>

    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <script type="application/javascript" src="../vendors/nprogress/nprogress.js"></script>

    <!-- jVectorMap -->
    <link rel="stylesheet" href="../jvectormap/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>

    <!-- FastClick -->
    <script type="application/javascript" src="../vendors/fastclick/lib/fastclick.js"></script>

    <!-- jQuery Sparklines -->
    <script type="application/javascript" src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script type="application/javascript" src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    <!-- Custom Theme Scripts -->
    <script type="application/javascript" src="../build/js/custom.min.js"></script>

    <!-- ECharts -->
    <script type="application/javascript" src="../vendors/echarts/dist/echarts.min.js"></script>
    <script type="application/javascript" src="../js/echart_theme.js"></script>

    <!-- jvectormap -->
    <script type="application/javascript" src="../jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script type="application/javascript" src="../jvectormap/jquery-jvectormap-us-aea.js"></script>

    <!-- select2 -->
    <script type="application/javascript" src="/vendors/select2/dist/js/select2.full.min.js"></script>
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
	

	
</head>

<body class="nav-md">

<script type="application/javascript" src="js/dashboardState.js"></script>


<div class="container body">
    <div class="main_container">
	
	
       

        <!-- page content -->
        <div class="right_col" role="main" >
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>EIA Dashboard</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>TimeLine</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="slider" style="height:15px;"></div>
                                <div style="height:40px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Excess/Shortage</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="resize_window1">
                                    <div id="jvectormap_usa" style="height:350px !important;"></div>
                                    <div style="height:20px;"></div>
                                </div>

                            </div>

                            <div class="x_title">
                                <h2>Filter Plants</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="x_content">
                                        <h4>By energy source</h4>
                                        <select name="plant_type" multiple="multiple"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Top 5 generation fuels</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="echart_mini_pie" style="height:425px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Electricity generating sectors</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="generating_secotrs_pie" style="height:425px;"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>EChart Line Graph</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="echart_line" style="height:275px;"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /page content -->

                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            Energy Admin Dashboard - Powered by <a href="https://www.eia.gov/">EIA</a>
                        </div>
                        <div class="clearfix">
						</div>
                    </footer>
                    <!-- /footer content -->
                </div>
				
            </div>

            <script type="application/javascript" src="/js/blocks/piechart.js"></script>
            <script type="application/javascript" src="/js/blocks/timeline.js"></script>
            <script type="application/javascript" src="/js/blocks/linechart.js"></script>
            <script type="application/javascript" src="/js/blocks/us_map.js"></script>
            <script type="application/javascript" src="/js/blocks/filter.js"></script>
</body>
</html>