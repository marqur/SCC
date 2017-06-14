<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        width: 100%;
        height: 500px;
      }
    </style>
  </head>
  <body>
    
    <div id="map"></div>
    <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: 44.949591, lng: 20.206277},
            zoom: 16
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUvTE9GjpTMCRYm0_MycmrEhhuTNtAjCw&callback=initMap">
     </script>
<script>
     function initMap() {
  var myLatLng = {lat: 44.949591, lng: 20.206277};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}

</script>
  </body>
</html>