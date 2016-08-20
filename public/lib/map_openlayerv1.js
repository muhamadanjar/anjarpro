proj4.defs("EPSG:4326","+proj=longlat +datum=WGS84 +no_defs");
proj4.defs("EPSG:27700","+proj=tmerc +lat_0=49 +lon_0=-2 +k=0.9996012717 +x_0=400000 +y_0=-100000 +ellps=airy +towgs84=446.448,-125.157,542.06,0.15,0.247,0.842,-20.489 +units=m +no_defs");

var bng = ol.proj.get('EPSG:27700');
var bng_4326 = ol.proj.get('EPSG:4326');

var resolutions = [1600,800,400,200,100,50,25,10,5,2.5,1,0.5,0.25,0.125,0.0625];
var overlays = {
    "RTH Publik": "rth:privat",
    "RTH Privat": "rth:publik",
};
var infoLayer = 'all';

var lOverlays = {};
var intLayersString;
var intLayers = [];
var rootURL = '/';
var singleAllLayers;

var view = new ol.View({
	projection: ol.proj.get('EPSG:4326'),
    center: [106.81, -6.6],
    //center:  ol.proj.transform([106.81, -6.6], 'EPSG:4326', 'EPSG:3857'),
    zoom: 13
});

var geolocation = new ol.Geolocation({
  projection: view.getProjection()
});


//BaseMap
var osm = new ol.layer.Tile({
    source: new ol.source.OSM()
});

var mapQuestSat = new ol.layer.Tile({
    source: new ol.source.MapQuest({layer: 'sat'})
})

var blayers = [osm];

var map = new ol.Map({
    target: 'map',
    layers: blayers,
    view: view
});

var popup = new ol.Overlay.Popup();
map.addOverlay(popup);

    for (layer in overlays) {
        var wmsSource = new ol.source.TileWMS({     
            url: '/geoserver/rth/wms',
            params: {
                'LAYERS': overlays[layer],
                'VERSION': '1.1.1',
                'FORMAT': 'image/png', 
                tiled: true,
            },
        });
        var wmsLayer = new ol.layer.Tile({
            source: wmsSource,
            visible: true,
        });
        map.addLayer(wmsLayer);
        lOverlays[layer] = wmsLayer;
        singleAllLayers = wmsLayer;
        updateInteractiveLayers(overlays[layer]);
    };
    
map.on('singleclick', function(evt) {
    popup.hide();
    popup.setOffset([0, 0]);

    var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
        return feature;
    });

    if (feature) {

        var coord = evt.coordinate;//feature.getGeometry().getCoordinates();
        var props = feature.getProperties();
        var info = "<h2><a href='" + props.caseurl + "'>" + props.casereference + "</a></h2>";
            info += "<p>" + props.locationtext + "</p>";
            info += "<p>Status: " + props.status + " " + props.statusdesc + "</p>";
        // Offset the popup so it points at the middle of the marker not the tip
        popup.setOffset([0, -22]);
        popup.show(coord, info);

    }else{
        if (infoLayer =='all') {
            var url = singleAllLayers
                .getSource()
                .getGetFeatureInfoUrl(
                    evt.coordinate,
                    map.getView().getResolution(),
                    map.getView().getProjection(),
                    {
                        'INFO_FORMAT': 'application/json',
                        //'propertyName': '*',
                        'LAYERS':intLayersString,
                        'QUERY_LAYERS':intLayersString, 
                        'FEATURE_COUNT': 50
                    }
                );
        }else{
            var url = lOverlays[infoLayer]
                .getSource()
                .getGetFeatureInfoUrl(
                    evt.coordinate,
                    map.getView().getResolution(),
                    map.getView().getProjection(),
                    {
                        'INFO_FORMAT': 'application/json',
                        //'propertyName': '*',
                        'LAYERS':intLayersString,
                        'QUERY_LAYERS':intLayersString, 
                        'FEATURE_COUNT': 50
                    }
                );
        }

        console.log(infoLayer);
            $.ajax({
                url: url,
                dataType : 'json',
                error:function (argument) {
                    console.log(argument)
                }
            }).then(function (data) {
                //console.log(data);
                var feature = data.features[0];
                if (feature) {
                    var content = "<table class='table table-condensed'>";
                    content += "<tr><td><b><u>" + feature.id.split('.')[0] + "</u></b></td></tr>";
                    for (var name in feature.properties) {
                        if (name == 'image_link') {
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td><image class='img-responsive' src='" + feature.properties[name] + "' width='100'/></td></tr>";
                        }else{
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td>" + feature.properties[name] + "</td></tr>";    
                        }
                    };
                    content += '</table>'; 
                    //var props = feature.properties;
                    //var info = "<h2>" + props.nama_rth + "</h2><p>" + props.jenis_rth + "</p>";
                    popup.show(evt.coordinate, content);
                }
            }); 
             
    }

    //var prettyCoord = ol.coordinate.toStringHDMS(ol.proj.transform(evt.coordinate, map.getView().getProjection(), 'EPSG:4326'), 2);
    //popup.show(evt.coordinate, '<div><h2>Coordinates</h2><p>' + prettyCoord + '</p></div>');
});
map.getLayers().forEach(function(layer, i) {
  bindInputs('#layer' + i, layer);
  if (layer instanceof ol.layer.Group) {
    layer.getLayers().forEach(function(sublayer, j) {
      bindInputs('#layer' + i + j, sublayer);
    });
  }
});

$('#layertree li > span').click(function() {
  $(this).siblings('fieldset').toggle();
}).siblings('fieldset').hide();



//**-------------Geolocation--------------------------**//

// create an Overlay using the div with id location.
var marker = new ol.Overlay({
  element: document.getElementById('location'),
  positioning: 'bottom-left',
  stopEvent: false
});

// add it to the map
map.addOverlay(marker);

// create a Geolocation object setup to track the position of the device
var geolocation = new ol.Geolocation({
  tracking: true
});

      // bind the projection to the view so that positions are reported in the
      // projection of the view
//geolocation.bindTo('projection', view);

      // bind the marker's position to the geolocation object, the marker will
      // move automatically when the GeoLocation API provides position updates
//marker.bindTo('position', geolocation);

      // when the GeoLocation API provides a position update, center the view
      // on the new position
geolocation.on('change:position', function() {
  var p = geolocation.getPosition();
  console.log(p[0] + ' : ' + p[1]);
  view.setCenter([parseFloat(p[0]), parseFloat(p[1])]);
});

//**----------------------------------------------**//

function el(id) {
  return document.getElementById(id);
}

function bindInputs(layerid, layer) {
    var visibilityInput = $(layerid + ' input.visible');
    visibilityInput.on('change', function() {
        layer.setVisible(this.checked);
    });
    visibilityInput.prop('checked', layer.getVisible());

    var opacityInput = $(layerid + ' input.opacity');
    opacityInput.on('input change', function() {
        layer.setOpacity(parseFloat(this.value));
    });
    opacityInput.val(String(layer.getOpacity()));
}

function updateInteractiveLayers(layer) {
    var index = $.inArray(layer, intLayers);//intLayers.indexOf(layer);
    if(index > -1) {
            intLayers.splice(index,1);
    } else {
            intLayers.push(layer);
    }
    intLayersString = intLayers.join();
};

var parseQueryString = function( queryString ) {
    var params = {}, queries, temp, i, l;
 
    // Split into key/value pairs
    queries = queryString.split("&");
 
    // Convert the array of strings into an object
    for ( i = 0, l = queries.length; i < l; i++ ) {
        temp = queries[i].split('=');
        params[temp[0]] = temp[1];
    }
 
    return params;
};
