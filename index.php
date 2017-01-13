<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EIA Dashboard</title>
    <!-- NoUISlider -->
    <link href="/css/nouislider.min.css" rel="stylesheet">


    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css"
          rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link rel="stylesheet" href="../jvectormap/jquery-jvectormap-2.0.3.css"
          type="text/css" media="screen"/>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Echarts
                            <small>Some examples to get you started</small>
                        </h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="Search for...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>jVector Map</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="jvectormap_usa"
                                     style="height:350px !important;"></div>
                                <div style="height:20px;"></div>
                                <div id="slider" style="height:15px;"></div>
                                <div style="height:40px;"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Net generation by fuel</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="echart_mini_pie"
                                     style="height:425px;"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>EChart Line Graph</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="echart_line"
                                     style="height:275px;"></div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Net generation by fuel2</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"
                                                   onclick="myFunction1()">Settings
                                                    1</a>
                                            </li>
                                            <li><a href="#"
                                                   onclick="myFunction2()">Settings
                                                    2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <p>Choose Information to Diasplay</p>
                                <!-- start pop-over -->
                                <div class="btn-group">
                                    <button id="button1 type=" button
                                    " class="btn btn-default"
                                    onclick="myFunction1()">
                                    Left
                                    </button>
                                    <button id="button2" type="button"
                                            class="btn btn-default"
                                            onclick="myFunction2()">
                                        Top
                                    </button>
                                    <button id="button3" type="button"
                                            class="btn btn-default"
                                            onclick="myFunction3()">
                                        Bottom
                                    </button>
                                    <button id="button4" type="button"
                                            class="btn btn-default"
                                            onclick="myFunction4()">
                                        Right
                                    </button>
                                </div>
                                <!-- end pop-over -->
                                <!--div id="echart_mini_pie2" style="height:275px;"></div-->

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Vertical Tabs
                                    <small>Float right</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="col-xs-9">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active"
                                             id="home-r">
                                            <p class="lead">Home tab</p>
                                            <p>Raw denim you probably haven't
                                                heard of them jean shorts
                                                Austin. Nesciunt tofu stumptown
                                                aliqua, retro synth master
                                                cleanse. Mustache cliche tempor,
                                                williamsburg carles vegan
                                                helvetica. Reprehenderit butcher
                                                retro keffiyeh dreamcatcher
                                                synth. Cosby sweater eu banh mi,
                                                qui irure terr.</p>
                                        </div>
                                        <div class="tab-pane" id="profile-r">
                                            Profile Tab.
                                        </div>
                                        <div class="tab-pane" id="messages-r">
                                            Messages Tab.
                                        </div>
                                        <div class="tab-pane" id="settings-r">
                                            Settings Tab.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <!-- required for floating -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabs-right">
                                        <li class="active"><a href="#home-r"
                                                              data-toggle="tab"
                                                              aria-expanded="true">Home</a>
                                        </li>
                                        <li class=""><a href="#profile-r"
                                                        data-toggle="tab"
                                                        aria-expanded="false">Profile</a>
                                        </li>
                                        <li class=""><a href="#messages-r"
                                                        data-toggle="tab"
                                                        aria-expanded="false">Messages</a>
                                        </li>
                                        <li class=""><a href="#settings-r"
                                                        data-toggle="tab"
                                                        aria-expanded="false">Settings</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>JQV Map</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i
                                                    class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i
                                                    class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i
                                                    class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id="j_usa"
                                     style="height:350px !important;"></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Energy Admin Dashboard - Powered by <a
                        href="https://www.eia.gov/">EIA</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- jQuery Sparklines -->
<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- easy-pie-chart -->
<script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<!-- ECharts -->
<script src="../vendors/echarts/dist/echarts.min.js"></script>
<script src="../js/echart_theme.js"></script>
<!-- jvectormap -->
<script src="../jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="../jvectormap/jquery-jvectormap-us-aea.js"></script>

<!-- line_graph_query_params  -->
<script>
    var line_graph_query_params = {
        "state[]": ["US-TX"],
        "year[]": 2010,
        "order_by[month]": "ASC",
        "columns[]": ["month", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["state", "month", "fuel"]
    }
</script>
<!-- line_graph_query_params  -->

<!-- jVectorMapTest -->
<script>

    $.getJSON('/api/plant.php', {
        "group_by[]": ["plant_lat, plant_lon"],
        "range[limit]": 500,
        "columns[]": ["plant_name", "plant_lat", "plant_lon"]
    }).done(function (data) {
        var myMarkers = [];

        $.each(data, function (i, item) {

            myMarkers[i] = {
                latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                name: item.name,
                style: {"fill": "yellow"}
            };
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
                markers: myMarkers
            });
        });
    });
</script>
<!-- /jVectorMapTest -->

<!-- easy-pie-area-chart -->
<script>
    function createPieChart() {
        var echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
        echartPieCollapse.showLoading('default',{
            text: 'Lade Daten...',
            effect: 'bubble',
            textStyle : {
                fontSize : 20
            }
        });
        console.log('loading');
        $.getJSON('/api/elec_gen.php', {
            "year[]": [2015],
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

            line_graph_query_params['fuel'] = columns;
            render_line_graph();

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
            echartPieCollapse.hideLoading();
        });

    }
    $(document).ready(createPieChart);
</script>
<!-- /easy-pie-area-chart -->

<!-- slider -->
<script src="/js/nouislider.min.js"></script>
<script>
    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [2010],
        step: 1,
        range: {
            'min': [2010],
            'max': [2015]
        },
        pips: {
            mode: 'values',
            values: [2010, 2011, 2012, 2013, 2014, 2015],
            density: 5
        }
    });

    slider.noUiSlider.on('change', function () {
        console.log("CHANGE!");
        createPieChart();
        //createUSMap();
        line_graph_query_params['year[]'] = slider.noUiSlider.get();
        render_line_graph();
    });
</script>
<!-- /slider-->

<!-- echart-linechart -->
<script>
    var echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
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

    function render_line_graph() {
        //line_graph_query_params['debug'] = 1;
        $.getJSON('/api/elec_gen.php', line_graph_query_params).done(function (data) {
            //console.log(data);
            var fuels = {};
            $.each(data, function (i, item) {
                if (typeof fuels[item.fuel] == 'undefined') {
                    fuels[item.fuel] = [];
                }
                fuels[item.fuel][item.month - 1] = item.SUM_amount;
            });

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
    }
</script>
<!-- /echart-linechart -->

</body>
</html>