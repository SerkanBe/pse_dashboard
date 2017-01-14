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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- jVectorMap -->
	<link rel="stylesheet" href="../jvectormap/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
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
                <h3>Echarts <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

					<div class="resize_window1">
                    <div id="jvectormap_usa" style="height:350px !important;"></div>
					<div style="height:20px;"></div>
					<div id="slider" style="height:15px;"></div>
					<div style="height:35px;"></div>
					</div>
					
                  </div>
                </div>
              </div>
  			  
			  <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Net generation by fuel</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <div id="echart_line" style="height:275px;"></div>

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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" onclick="myFunction1()">Settings 1</a>
                          </li>
                          <li><a href="#" onclick="myFunction2()">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

				  <p>Choose Information to Diasplay</p>
                    <!-- start pop-over -->
                    <div class="btn-group">
                      <button id="button1 type="button" class="btn btn-default" onclick="myFunction1(1)">
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
			  
			  
			  
			  
			  <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float right</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                        <li class="active"><a href="#home-r" data-toggle="tab" aria-expanded="true">Home</a>
                        </li>
                        <li class=""><a href="#profile-r" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                        <li class=""><a href="#messages-r" data-toggle="tab" aria-expanded="false">Messages</a>
                        </li>
                        <li class=""><a href="#settings-r" data-toggle="tab" aria-expanded="false">Settings</a>
                        </li>
                      </ul>
                    </div>

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
            Energy Admin Dashboard - Powered by <a href="https://www.eia.gov/">EIA</a>
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
	<!-- slider -->
	<script src="/js/nouislider.min.js"></script>
  
 
 <!-- line_graph_query_params  --> 
	<script>
	
	function myFunction1(i){
		
		if (i==1){ createUsMap("solar");}
		else if (i==2) {createUsMap("Coal");}
		else if (i==3) {createUsMap("wind");}
		else if (i==4) {createUsMap("nuclear");}
		else {};
		
	}
	var line_graph_query_params = {
          
      }
	  
	var jVectormap_query_params1 = {
		
	}
	
	var jVectormap_query_params2 = { jVectormap_query_params1

	}
	</script>
	<!-- line_graph_query_params  --> 
	

	
<!-- easy-pie-area-chart -->
	<script>	
	function createPieChart(code) {
		
	      var echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
      
		//var fuelinput;
		//if (code === undefined){fuelinput = "";}
		//else {fuelinput = "state[]:"+code;}
	            $.getJSON('/api/elec_gen.php', {
					//TODO fix initialization of chart without specific statefilter
					//fuelinput,
					"state[]": code,
					"year[]": [slider.noUiSlider.get()],
					"group_by[]": ["fuel"],
					"order_by[SUM_amount]": "DESC",
					"aggr[amount]": "SUM",
					"range[limit]": 5,
					"columns[]": ["fuel"]
          }).done(function(data) {
              var values = [];
			  var columns = [];
              $.each(data, function(i, item) {
				columns[i] = item.fuel;
				values[i] = {name: item.fuel, value: item.SUM_amount};
              });
		
		//line_graph_query_params['fuel'] = columns;
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
		  });
	}
	$(document).ready(createPieChart);
	</script>
<!-- /easy-pie-area-chart -->

<!-- slider -->

	<script>
	var slider = document.getElementById('slider');

		noUiSlider.create(slider, {
			start: [ 2003 ],
			step: 1,
			range: {
			'min': [  2003 ],
			'max': [ 2015 ]
			},
			pips: {
				mode: 'values',
				values: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015],
				density: 5
			}	
		});
		
		$('#slider').click(function() {
			createPieChart();
			createUSMap();
			//line_graph_query_params['year[]'] = slider.noUiSlider.get();
			render_line_graph();
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
          "columns[]": ["month","fuel"],
		  "aggr[amount]": "SUM",
		  "group_by[]": ["state","month","fuel"]
		}).done(function(data) {
			  //console.log(data);
			  var fuels = {};
			  $.each(data, function(i, item) {
				  if(typeof fuels[item.fuel] == 'undefined') {
					  fuels[item.fuel] = [];
				  }
				fuels[item.fuel][item.month-1] = item.SUM_amount;		
			  });
			  
			$.each(fuels,function(fuel,fuel_data) {
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
          data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Okt','Nov','Dec']
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
	function createUsMap(code){
		//var fuelinput;
		//if (code === undefined){fuelinput = "";}
		//else {fuelinput = "fuel[]:"+code;}
			$.getJSON('/api/plant.php', { 
				//fuelinput,
				//TODO fix initialization of chart without specific fuelfilter
				//TODO do not reload full map after new markers are set
				"state[]": code,
				"group_by[]": ["plant_lat, plant_lon"],
				"range[limit]": 1000,
				"columns[]": ["plant_name","plant_lat","plant_lon"]
				
			}).done(function(data) {
				var myMarkers = [];
		
				$.each(data, function(i, item) {
					
					if(item.fuel == "nuclear"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#212121"}};
					}
					else if(item.fuel == "solar"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#FFEB3B"}};
					}
					else if(item.fuel == "Coal"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#4E342E"}};
					}
					else if(item.fuel == "conventional hydroelectric"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#039BE5"}};
					}
					else if(item.fuel == "wind"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#E0F7FA"}};
					}
					else if(item.fuel == "natural gas"){
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#BDBDBD"}};
					}
					else{
					myMarkers[i] = {latLng:[parseFloat(item.lat),parseFloat(item.lon)], name: item.name, style: {"fill": "#F06292"}};
					}
					
					//console.log(myMarkers[i]);
				  });

				$(function(){
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
						selectedHover: {
						}	
					},
					markerStyle: {
							initial: {
								fill: '#F8E23B',
								stroke: '#383f47'
							  }
					},
					markers: myMarkers,
					onRegionClick: function (event, code) {
						//window.location.href = "yourpage?regionCode=" + code
						createPieChart(code); // add parameter with region for sql query
					},
					
					
					
					
					
					
				});
				});
				//jVector Map Function END
				
				
				
			});
	};
	$(document).ready(createUsMap);
	</script>
<!-- /jVectorMapTest -->
  </body>
</html>