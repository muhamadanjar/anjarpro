<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map_google {
        height: 100%;
    }
</style>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&&libraries=drawing,geometry"></script>

<div id="map_google"></div>
<div id="capture"></div>
    
<script type="text/javascript" src="{{ url('map_google.js') }}"></script>


