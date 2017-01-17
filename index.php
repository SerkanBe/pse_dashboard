<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--title>EIA Dashboard</title-->

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NoUISlider -->
    <link href="../vendors/nouislider/css/nouislider.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">


    <!-- jVectorMap -->
    <link rel="stylesheet" href="../jvectormap/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">

    <!-- select2 -->
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

</head>

<body class="nav-md">

<script type="application/javascript" src="js/dashboardState.js"></script>


<body class="nav-md footer_fixed">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">


                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>EIA Dashboard</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li><a href="index2.html">Dashboard2</a></li>
                                    <li><a href="index3.html">Dashboard3</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">General Form</a></li>
                                    <li><a href="form_advanced.html">Advanced Components</a></li>
                                    <li><a href="form_validation.html">Form Validation</a></li>
                                    <li><a href="form_wizards.html">Form Wizard</a></li>
                                    <li><a href="form_upload.html">Form Upload</a></li>
                                    <li><a href="form_buttons.html">Form Buttons</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> UI Elements <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="general_elements.html">General Elements</a></li>
                                    <li><a href="media_gallery.html">Media Gallery</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="icons.html">Icons</a></li>
                                    <li><a href="glyphicons.html">Glyphicons</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                    <li><a href="invoice.html">Invoice</a></li>
                                    <li><a href="inbox.html">Inbox</a></li>
                                    <li><a href="calendar.html">Calendar</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tables.html">Tables</a></li>
                                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="chartjs.html">Chart JS</a></li>
                                    <li><a href="chartjs2.html">Chart JS2</a></li>
                                    <li><a href="morisjs.html">Moris JS</a></li>
                                    <li><a href="echarts.html">ECharts</a></li>
                                    <li><a href="other_charts.html">Other Charts</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Live On</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i> Additional Pages <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">E-commerce</a></li>
                                    <li><a href="projects.html">Projects</a></li>
                                    <li><a href="project_detail.html">Project Detail</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="profile.html">Profile</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="page_403.html">403 Error</a></li>
                                    <li><a href="page_404.html">404 Error</a></li>
                                    <li><a href="page_500.html">500 Error</a></li>
                                    <li><a href="plain_page.html">Plain Page</a></li>
                                    <li><a href="login.html">Login Page</a></li>
                                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#level1_1">Level One</a>
                                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                                            </li>
                                            <li><a href="#level2_1">Level Two</a>
                                            </li>
                                            <li><a href="#level2_2">Level Two</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#level1_2">Level One</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                                            class="label label-success pull-right">Coming Soon</span></a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <!--h3>EIA Dashboard</h3-->
                    </div>
                </div>

                <div class="clearfix"></div>


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

                            <!--div class="x_title">
                                <h2>Filter Plants</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div-->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_content">
                                        <h4>Filter Plants by energy source</h4>
                                        <select name="plant_type" multiple="multiple" style="width:100%"></select>
                                        <br><br>
                                        <div class="clearfix"></div>
                                        <div class="btn-group">
                                            <button name="plant_type_predef[green]" value="green" type="button"
                                                    class="btn btn-default">Green-Energy
                                            </button>
                                            <button name="plant_type_predef[brown]" value="brown" type="button"
                                                    class="btn btn-default">Coal/Oil/Gas
                                            </button>
                                            <button name="plant_type_predef[nuclear]" value="nuclear" type="button"
                                                    class="btn btn-default">Nuclear
                                            </button>
                                            <button name="plant_type_predef[_all]" value="_all" type="button"
                                                    class="btn btn-default">All
                                            </button>
                                            <button name="plant_type_predef[_none]" value="_none" type="button"
                                                    class="btn btn-default">Clear
                                            </button>
                                        </div>
										
										<div class="btn-group2">
                                            <button name="plant_map_type" value="windspeed" type="button"
                                                    class="btn btn-default">mean windspeed mp/h
                                            </button>
                                            <button name="plant_map_type" value="temp" type="button"
                                                    class="btn btn-default">mean Temp/mean sunlight hrs
                                            </button>
											<button name="plant_map_type" value="clear" type="button"
                                                    class="btn btn-default">Clear
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Growth of source-usage</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="fuel_growth_linechart" style="height:350px;"></div>

                                <h4>Filter by energy source</h4>
                                <div class="btn-group">
                                    <button name="fuel_growth_predef[green]" value="green" type="button"
                                            class="btn btn-default">Green-Energy
                                    </button>
                                    <button name="fuel_growth_predef[brown]" value="brown" type="button"
                                            class="btn btn-default">Coal/Oil/Gas
                                    </button>
                                    <button name="fuel_growth_predef[nuclear]" value="nuclear" type="button"
                                            class="btn btn-default">Nuclear
                                    </button>
                                    <button name="fuel_growth_predef[_all]" value="_all" type="button"
                                            class="btn btn-default">All
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Adjust time period</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="slider" style="height:15px;"></div>
                                <div style="height:40px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 id="top5">Top generation fuels</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="echart_mini_pie" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 id="top5">Top renewable fuels</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="echart_mini_pie_top_renewable" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
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

                                <div id="generating_secotrs_pie" style="height:400px;"></div>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Electricity generation by fuel</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="echart_line" style="height:400px;"></div>

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

            <!-- jQuery -->
            <script type="application/javascript" src="../vendors/jquery/dist/jquery.min.js"></script>

            <!-- Bootstrap -->
            <script type="application/javascript" src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

            <!-- NoUISlider -->
            <script type="application/javascript" src="../vendors/nouislider/js/nouislider.min.js"></script>

            <!-- NProgress -->
            <script type="application/javascript" src="../vendors/nprogress/nprogress.js"></script>

            <!-- FastClick -->
            <script type="application/javascript" src="../vendors/fastclick/lib/fastclick.js"></script>

            <!-- jQuery Sparklines -->
            <script type="application/javascript"
                    src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
            <!-- easy-pie-chart -->
            <script type="application/javascript"
                    src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

            <!-- ECharts -->
            <script type="application/javascript" src="../vendors/echarts/dist/echarts.js"></script>
            <script type="application/javascript" src="../js/echart_theme.js"></script>

            <!-- jvectormap -->
            <script type="application/javascript" src="../jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script type="application/javascript" src="../jvectormap/jquery-jvectormap-us-aea.js"></script>

            <!-- select2 -->
            <script type="application/javascript" src="/vendors/select2/dist/js/select2.full.min.js"></script>

            <!-- jQuery custom content scroller -->
            <script type="application/javascript"
                    src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

            <!-- Custom Theme Scripts -->
            <script type="application/javascript" src="../build/js/custom.js"></script>

            <script type="application/javascript" src="/js/blocks/piechart.js"></script>
            <script type="application/javascript" src="/js/blocks/timeline.js"></script>
            <script type="application/javascript" src="/js/blocks/linechart.js"></script>
            <script type="application/javascript" src="/js/blocks/fuelGrowthLine.js"></script>

            <script type="application/javascript" src="/js/blocks/us_map.js"></script>
            <script type="application/javascript" src="/js/blocks/filter.js"></script>


</body>
</html>