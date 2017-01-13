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
	
	<!-- Kartograph Map -->
	<!--script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/kartograph/kartograph.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- JQVMap -->
    <!-- link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
	<!-- JVectorMap -->
	<!--link rel="stylesheet" href="../jvectormap/jquery-jvectormap.min.css" type="text/css" media="screen"/>
	<script src="../jvectormap/jquery-3.1.1.min.js"></script>
	<script src="../jvectormap/jquery-jvectormap.min.js"></script>
	<script src="../jvectormap/jquery-jvectormap-world-mill.js"></script>
	

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
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>JQV MAP</h2>
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

                    <div id="jqvmap_usa" style="height:350px !important;"></div>

                  </div>
                </div>
              </div>

			  <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kartograph Map</h2>
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

                    <div id="kartographmap_usa" style="height:350px !important;"></div>

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

                    <div id="echart_mini_pie" style="height:350px;"></div>

                  </div>
                </div>
              </div>
			  
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>jVectorMap</h2>
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

                    <div id="jvectormap_usa" style="height:350px;width: 600px"></div>
					<!-- jVectorMapTest -->
					<script>
						$(function(){
						  $('#jvectormap_usa').vectorMap({map: 'us_mill'});
						});
					</script>
					 <!-- /jVectorMapTest -->
					 
                  </div>
                </div>
              </div>
			  
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Time Slider</h2>
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
					
                    <div id="slider" style="height:15px;"></div>
					<div style="height:30px;"></div>

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

                    <div id="echart_line" style="height:350px;"></div>

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
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.usa.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
	<script src="../js/echart_theme.js"></script>
  
	<script>
	var line_graph_query_params = {
          "state[]": ["US-TX"],
          "year[]": 2010,              
          "order_by[month]": "ASC",			
          "columns[]": ["month","fuel"],
		  "aggr[amount]": "SUM",
		  "group_by[]": ["state","month","fuel"]
      }
	</script>
	
<!-- JQVMap -->
    <script>
	
	function createUSMap() {
          //http://local.pse/api/elec_gen.php?year[]=2014&group_by[]=state&order_by[state]=ASC&aggr[amount]=SUM&columns[]=state
			
          $.getJSON('/api/elec_gen.php', {
              "year[]": [slider.noUiSlider.get()],
              "group_by[]": ["state"],
              "order_by[state]": "ASC",
              "aggr[amount]": "SUM",
              "columns[]": ["state"]
          }).done(function(data) {
              var map_data = {};
              $.each(data, function(i, item) {
                  
                  map_data[item.state.substring(3).toLowerCase()] = item.SUM_amount;
              });

              $('#jqvmap_usa').vectorMap({
                  map: 'usa_en',
                  backgroundColor: null,
                  color: '#ffffff',
                  hoverOpacity: 0.7,
                  selectedColor: '#666666',
                  enableZoom: true,
                  showTooltip: true,
                  values: map_data,
                  scaleColors: ['#E6F2F0', '#149B7E'],
                  normalizeFunction: 'polynomial'
              });
          });
      }
      $(document).ready(createUSMap);
	  
    </script>
<!-- /JQVMap -->

<!-- easy-pie-area-chart -->
	<script>	
	function createPieChart() {
	      var echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
      
	            $.getJSON('/api/elec_gen.php', {
				  "year[]": [2015],
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
			start: [ 2010 ],
			step: 1,
			range: {
			'min': [  2010 ],
			'max': [ 2015 ]
			},
			pips: {
				mode: 'values',
				values: [2010,2011,2012,2013,2014,2015],
				density: 5
			}	
		});
		
		$('#slider').click(function() {
			createPieChart();
			createUSMap();
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
          data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Okt','Nov','Dec']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: []
      };
	  
		function render_line_graph() {
		  //line_graph_query_params['debug'] = 1;
		$.getJSON('/api/elec_gen.php', line_graph_query_params).done(function(data) {
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
	  }	  
	  </script>
<!-- echart-linechart -->

<!-- kartograph-us_map2 -->
	  <script>
	  function createUSMap2() {
          //http://local.pse/api/elec_gen.php?year[]=2014&group_by[]=state&order_by[state]=ASC&aggr[amount]=SUM&columns[]=state
			//select name, lat, lon from plant group by lat, lon
			
		/*	
			var map_data = {};
			$.getJSON('/api/elec_gen.php', {
              "year[]": [slider.noUiSlider.get()],
              "group_by[]": ["state"],
              "order_by[state]": "ASC",
              "aggr[amount]": "SUM",
              "columns[]": ["state"]
          }).done(function(data) {
              
              $.each(data, function(i, item) {
                  
                  map_data[item.state.substring(3).toLowerCase()] = item.SUM_amount;
              });
			});
			*/
			
			
			var map_data2 = {};
			$.getJSON('/api/plant.php', {
				
              "group_by[]": ["plant_lat, plant_lon"],
			  //alles ab 100 aufwärts kann nicht verarbeitet werden
			  "range[limit]": 99,
              "columns[]": ["plant_name","plant_lat","plant_lon"]
			}).done(function(data) {
				
              
			$.each(data, function(i, item) {
			 // if(typeof map_data2[item.lat] == 'NULL') {
				  map_data2[item.item] = [];
			  //}
			  
			  map_data2[i] = {name: item.name, lat: item.lat, lon: item.lon};
				 
			  });
		  });

			  var svgUrl = '../images/usa.svg',
			opts = { };

		kartograph.map('#kartographmap_usa').loadMap(svgUrl, mapLoaded, opts);

		function mapLoaded(map) {
			map.addLayer('layer0', {
				styles: {
					stroke: '#aaa',
					fill: '#f6f4f2'
				},
				mouseenter: function(d, path) {
					path.attr('fill', '#2ba58a');
				

				},
				mouseleave: function(d, path) {
					path.attr('fill', '#f6f4f2');
				
				},
				
				click: function(data, path, event) {
					// handle mouse clicks
					// *data* holds the data dictionary of the clicked path
					// *path* is the raphael object
					// *event* is the original JavaScript event
				}}
			);
				console.log("hi");
				var plants = map_data2;
				console.log(plants);
				
				//[
				//	{ name: 'Juneau, AK', lat: 58.3, lon: -134.416667 },
				//	{ name: 'Honolulu, HI', lat: 21.3, lon: -157.816667 },
				//	{ name: 'San Francisco, CA', lat: 37.783333, lon: -122.416667 }
				//];

				map.addSymbols({
					type: kartograph.LabeledBubble,
					data: plants,
					location: function(d) { return [d.lon, d.lat] },
					//title: function(d) { return d.name; },
					radius: 3,
					center: false,
					attrs: { fill: 'black' },
					labelattrs: { 'font-size': 11 },
					buffer: false
				}); 
		   
			}
	  }
	  createUSMap2();
		</script>
<!-- /kartograph-map -->



<!-- jVectorMap -->
<script>
/*
$(function(){
  $.getJSON('/data/us-unemployment.json', function(data){
    var val = 2009;
        statesValues = jvm.values.apply({}, jvm.values(data.states)),
        metroPopValues = Array.prototype.concat.apply([], jvm.values(data.metro.population)),
        metroUnemplValues = Array.prototype.concat.apply([], jvm.values(data.metro.unemployment));

    $('#world-map-gdp').vectorMap({
      map: 'us_aea',
      markers: data.metro.coords,
      series: {
        markers: [{
          attribute: 'fill',
          scale: ['#FEE5D9', '#A50F15'],
          values: data.metro.unemployment[val],
          min: jvm.min(metroUnemplValues),
          max: jvm.max(metroUnemplValues)
        },{
          attribute: 'r',
          scale: [5, 20],
          values: data.metro.population[val],
          min: jvm.min(metroPopValues),
          max: jvm.max(metroPopValues)
        }],
        regions: [{
          scale: ['#DEEBF7', '#08519C'],
          attribute: 'fill',
          values: data.states[val],
          min: jvm.min(statesValues),
          max: jvm.max(statesValues)
        }]
      },
      onMarkerTipShow: function(event, label, index){
        label.html(
          '<b>'+data.metro.names[index]+'</b><br/>'+
          '<b>Population: </b>'+data.metro.population[val][index]+'</br>'+
          '<b>Unemployment rate: </b>'+data.metro.unemployment[val][index]+'%'
        );
      },
      onRegionTipShow: function(event, label, code){
        label.html(
          '<b>'+label.html()+'</b></br>'+
          '<b>Unemployment rate: </b>'+data.states[val][code]+'%'
        );
      }
    });

    var mapObject = $('#world-map-gdp').vectorMap('get', 'mapObject');

    $("#slider").slider({
      value: val,
      min: 2005,
      max: 2009,
      step: 1,
      slide: function( event, ui ) {
        val = ui.value;
        mapObject.series.regions[0].setValues(data.states[ui.value]);
        mapObject.series.markers[0].setValues(data.metro.unemployment[ui.value]);
        mapObject.series.markers[1].setValues(data.metro.population[ui.value]);
      }
    });
  });
});
*/

</script>
<!-- /jVectorMap -->

  </body>
</html>