<!DOCTYPE html>
<html>
<head>
  <title>jVectorMap demo</title>
  <link rel="stylesheet" href="../jvectormap/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!--script src="../jvectormap/jquery-3.1.1.min.js"></script>
  <!-- jvectormap -->
  <script src="../jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="../jvectormap/jquery-jvectormap-us-aea.js"></script>
</head>
<body>
  <div id="world-map" style="width: 600px; height: 400px"></div>
  <script>
    $(function(){
      $('#world-map').vectorMap({map: 'us_aea'});
    });
  </script>
</body>
</html>