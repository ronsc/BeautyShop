
<style>
    html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
    }
</style>

<div id="map-canvas"></div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
    function initialize() {
        var myLatlng = new google.maps.LatLng(13.7246005, 100.6331108);
        var mapOptions = {
            zoom: 4,
            center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Share Olanlab Com'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

