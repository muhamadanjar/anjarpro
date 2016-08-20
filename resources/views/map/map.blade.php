@extends('app2')
@section('content')    
    <link type="text/css" rel="stylesheet" href="vendor/leaflet/leaflet.css" />
 
    <link rel="stylesheet" href="lib/leaflet-locate/L.Control.Locate.css" />
    <link rel="stylesheet" href="css/mainmap.css" />
    <link rel="stylesheet" href="css/nps.css" />
    <link rel="stylesheet" href="lib/gcc_geosearch/l.gcc_geosearch.css" />

    <script type="text/javascript" src="vendor/leaflet/leaflet.js"></script>
    
    <script src="lib/listBaseLayers.js" type="text/javascript"></script>
    <!--<script src="src/leaflet/gcc_config.js" type="text/javascript"></script>-->
    <script type="text/javascript">
    //gcc_config.js
        var gccAtt = 'Data &copy <a href=http://maps.gcc.tas.gov.au>GCC</a>, <a href="https://maps.gcc.tas.gov.au/licensing.html">CC-BY</a>';
    </script>

    <!--[if lt IE 9]>
     <link rel="stylesheet" href="src/leaflet/locate/L.Control.Locate.ie.css" />
     <link rel="stylesheet" href="src/leaflet/gcc_geosearch/l.gcc_geosearch.ie.css" />
     <link rel="stylesheet" href="css/ie6.css" type="text/css" />
    <![endif]-->

    <script src="lib/gcc_geosearch/gcc_geosearch.js"></script>
    <script src="lib/leaflet-locate/L.Control.Locate.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/proj4js/proj4js-compressed.js"></script>
    <script src="lib/EPSG28355.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<div id="map"></div>
<script>
    var center = new L.LatLng(-6.6418, 106.7998);
    var extend = {xMin: 694070.43,yMin:9263972.73,xMax :704303.07,yMax:9278800.74};
    var map = new L.Map('map', { center: center, zoom: 14, attributionControl:true, zoomControl:false, minZoom:11});    

    var src = new Proj4js.Proj('EPSG:4326');
    var dst = new Proj4js.Proj('EPSG:32748');   
    
    var baselayers = {
       
        "LIST Local": baselocal,
        "esri Street":esriStreet,
        "esri Topo":esriTopo,

    };    
    map.addLayer(esriTopo)
    
    var rootURL = '/';
    var overlays = {
        "RTH Privat": "rth:privat",
        "RTH Publik": "rth:publik",
        //"RTH Gabungan":"rth:geo_rth_gabungan"
       
    };
    var lOverlays = {};

    //Set up trigger functions for adding layers to interactivity.
    map.on('overlayadd', function(e) {
        updateInteractiveLayers(e.layer.options.layers);
    }); 
    map.on('overlayremove', function(e) {
        updateInteractiveLayers(e.layer.options.layers);
    }); 

    var intLayers = [];
    var intLayersString = "";
    function updateInteractiveLayers(layer) {
        var index = $.inArray(layer, intLayers);//intLayers.indexOf(layer);
        if(index > -1) {
            intLayers.splice(index,1);
        } else {
            intLayers.push(layer);
        }
        intLayersString = intLayers.join();
    };
    for (layer in overlays) {
        var newLayer = new L.TileLayer.WMS(rootURL + "geoserver/ows", {
            layers: overlays[layer],
            format: 'image/png',
            transparent: true,
            maxZoom: 20,
            attribution: gccAtt
        });
        lOverlays[layer] = newLayer;
        map.addLayer(newLayer);
        updateInteractiveLayers(overlays[layer]);
    };

    function handleJson(data) {
    
        selectedFeature = L.geoJson(data, {
            style: function (feature) {
                return {color: 'yellow'};
            },
            onEachFeature: function (feature, layer) {
                var content = "";
                content = content + "<b><u>" + feature.id.split('.')[0] + "</b></u><br>";
                delete feature.properties.bbox;
                for (var name in feature.properties) {content = content + "<b>" + name + ":</b> " + feature.properties[name] + "<br>"};
                var popup = L.popup()
                    .setLatLng(queryCoordinates)
                    .setContent(content)
                    .openOn(map);
                layer.bindPopup(content);
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight
                });
            },                
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 5,
                    fillColor: "yellow",
                    color: "#000",
                    weight: 5,
                    opacity: 0.6,
                    fillOpacity: 0.2
                });
            }
        });
        console.log(selectedFeature);
        selectedFeature.addTo(map);
    }

    //Query layer functionality.
    var selectedFeature;
    var queryCoordinates;
    var src = new Proj4js.Proj('EPSG:4326');
    //var dst = new Proj4js.Proj('EPSG:28355');
    var dst = new Proj4js.Proj('EPSG:32748');
    
    map.on('click', function(e) {
        if (selectedFeature) {
            map.removeLayer(selectedFeature);
        };
        var owsrootUrl = rootURL + 'geoserver/wms';
        
        var p = new Proj4js.Point(e.latlng.lng,e.latlng.lat);
        Proj4js.transform(src, dst, p);
        queryCoordinates = e.latlng;
        //console.log(intLayersString);
        var defaultParameters = {
            service : 'WFS',
            version : '1.1.1',
            request : 'GetFeature',
            typeName : intLayersString,
            maxFeatures : 100,
            outputFormat : 'text/javascript',
            format_options : 'callback:getJson',
            SrsName : 'EPSG:4326'
        };

        var customParams = {
            //bbox : map.getBounds().toBBoxString(),
            //cql_filter:'DWithin(geom, POINT(' + p.x + ' ' + p.y + '), 10, meters)'
        };

        var parameters = L.Util.extend(defaultParameters, customParams);


        var url = owsrootUrl + L.Util.getParamString(parameters)
        console.log(url);

        $.ajax({
            url : owsrootUrl + L.Util.getParamString(parameters),
            dataType : 'jsonp',
            jsonpCallback : 'getJson',
            success : handleJson,
            error:function (argument) {
                console.log(argument)
            }

        });
    });

    function highlightFeature(e) {
        var layer = e.target;
        layer.setStyle({
            fillColor: "yellow",
            color: "yellow",
            weight: 5,
            opacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
    }

    function resetHighlight(e) {
        var layer = e.target;
        layer.setStyle({
            radius: 5,
            fillColor: "yellow",
            color: "yellow",
            weight: 5,
            opacity: 0.6,
            fillOpacity: 0.2
        });
    }

    //Location control
    L.control.locate({
        position: 'topright',  
        drawCircle: false,
        follow: false
    }).addTo(map);
    //Zoom control
    L.control.zoom().addTo(map);    
    //Layer control
    L.control.layers(baselayers, lOverlays, {position: 'topleft'}).addTo(map);
    //Search control
    L.control.searchControl().addTo(map);
    
    </script>

@stop