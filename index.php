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

    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>EIA Dashboard</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
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
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
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
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Net generation by fuel2</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <p>Choose Information to Diasplay</p>
                                <!-- start pop-over -->
                                <div class="btn-group">
                                    <button id="button1 type=" button
                                    " class="btn btn-default" onclick="myFunction1(1)">
                                    Solar
                                    </button>
                                    <button id="button2" type="button" class="btn btn-default" onclick="myFunction1(2)">
                                        Coal
                                    </button>
                                    <button id="button3" type="button" class="btn btn-default" onclick="myFunction1(3)">
                                        Wind
                                    </button>
                                    <button id="button4" type="button" class="btn btn-default" onclick="myFunction1(4)">
                                        Nuclear
                                    </button>
                                </div>
                                <!-- end pop-over -->
                                <!--div id="echart_mini_pie2" style="height:275px;"></div-->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Net generation by fuel</h2>
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

                    <div class="col-md-6 col-sm-6 col-xs-12">
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


                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Vertical Tabs
                                    <small>Float right</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="col-xs-9">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home-r">
                                            <p class="lead">Home tab</p>
                                            <p>INFO ABOUT CURRENT STATE OR WHATEVER</p>
                                        </div>
                                        <div class="tab-pane" id="profile-r">Profile Tab.</div>
                                        <div class="tab-pane" id="messages-r">Messages Tab.</div>
                                        <div class="tab-pane" id="settings-r">Settings Tab.</div>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <!-- required for floating -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabs-right">
                                        <li class="active">
                                            <a href="#home-r" data-toggle="tab" aria-expanded="true">Home</a>
                                        </li>
                                        <li class="">
                                            <a href="#profile-r" data-toggle="tab" aria-expanded="false">Profile</a>
                                        </li>
                                        <li class="">
                                            <a href="#messages-r" data-toggle="tab" aria-expanded="false">Messages</a>
                                        </li>
                                        <li class="">
                                            <a href="#settings-r" data-toggle="tab" aria-expanded="false">Settings</a>
                                        </li>
                                    </ul>
                                </div>

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
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>


            <script type="application/javascript">
                var dashboardState = {};

                var ecConfig = require('echarts/config');
            </script>

            <!-- easy-pie-area-chart -->
            <script>
                var echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
                function createPieChart() {
                    echartPieCollapse.showLoading('default', {
                        text: 'Lade Daten...',
                        effect: 'bubble',
                        textStyle: {
                            fontSize: 20
                        }
                    });
                    $.getJSON('/api/elec_gen.php', {
                        "year[]": (dashboardState.year || 2015),
                        "group_by[]": ["fuel"],
                        "order_by[SUM_amount]": "DESC",
                        "aggr[amount]": "SUM",
                        "range[limit]": 5,
                        "columns[]": ["fuel"]
                    }).done(function (data) {
                        var values = [];
                        var columns = [];
                        $.each(data, function (i, item) {
                            columns[i] = item.fuel;
                            values[i] = {name: item.fuel, value: item.SUM_amount};
                        });

                        dashboardState.fuel = columns;

                        echartPieCollapse.setOption({
                            tooltip: {
                                trigger: 'item',
                                formatter: "{a} <br/>{b} : {c} ({d}%)"
                            },
                            legend: {
                                orient: 'vertical',
                                x: 'right',
                                y: 'bottom',
                                data: columns
                            },
                            toolbox: {
                                show: true,
                                feature: {
                                    magicType: {
                                        show: true,
                                        type: ['pie', 'funnel']
                                    },
                                    restore: {
                                        show: true,
                                        title: "Restore"
                                    },
                                    saveAsImage: {
                                        show: true,
                                        title: "Save Image"
                                    }
                                }
                            },
                            calculable: true,
                            series: [{
                                name: 'Area Mode',
                                type: 'pie',
                                radius: [30, 110],
                                center: ['50%', 170],
                                roseType: 'area',
                                x: 'center',
                                max: 40,
                                sort: 'ascending',
                                data: values
                            }]
                        });
                        render_line_graph();
                        echartPieCollapse.hideLoading();
                    });
                }
                $(document).ready(createPieChart);
            </script>
            <!-- /easy-pie-area-chart -->

            <!-- slider -->
            <script type="application/javascript">
                var slider = document.getElementById('slider');

                noUiSlider.create(slider, {
                    start: [2001],
                    step: 1,
                    range: {
                        'min': [2001],
                        'max': [2015]
                    },
                    pips: {
                        mode: 'values',
                        values: [2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015],
                        density: 5
                    }
                });

                slider.noUiSlider.on('change', function () {
                    createPieChart();
                    //createUSMap();
                });
            </script>
            <!-- /slider-->

            <!-- echart-linechart -->
            <script>
                function render_line_graph() {
                    var echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);

                    $.getJSON('/api/elec_gen.php', {
                        "state[]": ["US-TX"],
                        "year[]": [slider.noUiSlider.get()],
                        "order_by[month]": "ASC",
                        "columns[]": ["month", "fuel"],
                        "aggr[amount]": "SUM",
                        "group_by[]": ["state", "month", "fuel"]
                    }).done(function (data) {
                        //console.log(data);
                        var fuels = {};
                        $.each(data, function (i, item) {
                            if (typeof fuels[item.fuel] == 'undefined') {
                                fuels[item.fuel] = [];
                            }
                            fuels[item.fuel][item.month - 1] = item.SUM_amount;
                        });
                        lineChartOptions.series = [];
                        $.each(fuels, function (fuel, fuel_data) {
                            lineChartOptions.series.push({
                                name: fuel,
                                type: 'line',
                                smooth: true,
                                itemStyle: {
                                    normal: {
                                        areaStyle: {
                                            type: 'default'
                                        }
                                    }
                                },
                                data: fuel_data
                            });
                        });
                        echartLine.setOption(lineChartOptions);
                    });

                    var lineChartOptions = {
                        title: {
                            text: 'Line Graph',
                            subtext: 'Subtitle'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            x: 220,
                            y: 40,
                            data: []
                        },

                        toolbox: {
                            show: true,
                            feature: {
                                magicType: {
                                    show: true,
                                    title: {
                                        line: 'Line',
                                        bar: 'Bar',
                                        stack: 'Stack',
                                        tiled: 'Tiled'
                                    },
                                    type: ['line', 'bar', 'stack', 'tiled']
                                },
                                restore: {
                                    show: true,
                                    title: "Restore"
                                },
                                saveAsImage: {
                                    show: true,
                                    title: "Save Image"
                                }
                            }
                        },
                        calculable: true,
                        xAxis: [{
                            type: 'category',
                            boundaryGap: false,
                            data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec']
                        }],
                        yAxis: [{
                            type: 'value'
                        }],
                        series: []
                    };


                    //line_graph_query_params['debug'] = 1;

                }
                $(document).ready(render_line_graph);
            </script>
            <!-- /echart-linechart -->

            <!-- jVectorMapTest -->
            <script>
                function createUsMap() {
                    $.getJSON('/api/plant.php', {
                        //fuelinput,
                        //TODO fix initialization of chart without specific fuelfilter
                        //TODO do not reload full map after new markers are set
                        //"state[]": 'US-TX',
                        "group_by[]": ["plant_lat, plant_lon"],
                        "range[limit]": 1000,
                        "columns[]": ["plant_name", "plant_lat", "plant_lon"],
                        "year[]": (dashboardState.year || 2015)

                    }).done(function (data) {
                        var myMarkers = [];

                        $.each(data, function (i, item) {

                            if (item.fuel == "nuclear") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#212121"}
                                };
                            }
                            else if (item.fuel == "solar") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#FFEB3B"}
                                };
                            }
                            else if (item.fuel == "Coal") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#4E342E"}
                                };
                            }
                            else if (item.fuel == "conventional hydroelectric") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#039BE5"}
                                };
                            }
                            else if (item.fuel == "wind") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#E0F7FA"}
                                };
                            }
                            else if (item.fuel == "natural gas") {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#BDBDBD"}
                                };
                            }
                            else {
                                myMarkers[i] = {
                                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                                    name: item.name,
                                    style: {"fill": "#F06292"}
                                };
                            }

                            //console.log(myMarkers[i]);
                        });

                        $(function () {
                            $('#jvectormap_usa').vectorMap({
                                map: 'us_aea',


                                backgroundColor: 'white',
                                regionStyle: {
                                    initial: {
                                        fill: '#009688',
                                        "fill-opacity": 1,
                                        stroke: 'none',
                                        "stroke-width": 0,
                                        "stroke-opacity": 1
                                    },
                                    hover: {
                                        "fill-opacity": 0.8,
                                        cursor: 'pointer'
                                    },
                                    selected: {
                                        fill: 'yellow'
                                    },
                                    selectedHover: {}
                                },
                                markerStyle: {
                                    initial: {
                                        fill: '#F8E23B',
                                        stroke: '#383f47'
                                    }
                                },
                                markers: myMarkers,
                                /*
                                 onRegionClick: function (event, code) {
                                 //window.location.href = "yourpage?regionCode=" + code
                                 createPieChart(code); // add parameter with region for sql query
                                 },*/


                            });
                        });


                    });
                }
                ;
                $(document).ready(createUsMap);
                //$(document).ready(render_line_graph);
            </script>
            <!-- /jVectorMapTest -->
</body>
</html>