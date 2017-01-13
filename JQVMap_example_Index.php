<!DOCTYPE html>
<html>
<head>
  <title>JQVMAP demo</title>
  <!-- JQVMap -->
  < link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <div id="jqvmap_usa" style="height: 350px;"></div>
  <script>
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
	
	
  </script>
</body>
</html>