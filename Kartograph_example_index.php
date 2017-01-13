<!DOCTYPE html>
<html>
<head>
  <title>Kartograph demo</title>
  <!-- Kartograph Map -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/kartograph/kartograph.min.js"></script>
</head>
<body>
  <div id="kartographmap_usa" style="height: 350px;"></div>
  <script>
    function createUSMap2() {
          //http://local.pse/api/elec_gen.php?year[]=2014&group_by[]=state&order_by[state]=ASC&aggr[amount]=SUM&columns[]=state
			//select name, lat, lon from plant group by lat, lon
			
			
			var map_data = {};
			$.getJSON('/api/elec_gen.php', {
              "year[]": [2015],
              "group_by[]": ["state"],
              "order_by[state]": "ASC",
              "aggr[amount]": "SUM",
              "columns[]": ["state"]
          }).done(function(data) {
              
              $.each(data, function(i, item) {
                  
                  map_data[item.state.substring(3).toLowerCase()] = item.SUM_amount;
              });
			});
			
			
			
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
</body>
</html>