// Variabili globali
var map;
var bounds;
var control;
var gmap,gphy,gsat,ghyb;

// Evita le mattonelle rosa
OpenLayers.IMAGE_RELOAD_ATTEMPTS = 3;
OpenLayers.Util.onImageLoadErrorColor = "transparent";

function initMap(){
	var options = {
			controls:[ 
				new OpenLayers.Control.Zoom() 
			],
			projection: new OpenLayers.Projection("EPSG:900913"),
            displayProjection: new OpenLayers.Projection("EPSG:4326"),
            units: "m",
            numZoomLevels: 18,
            maxResolution: 156543.0339,
            maxExtent: new OpenLayers.Bounds(-20037508, -20037508,20037508, 20037508.34)
    };
    map = new OpenLayers.Map('map', options);
    bounds = new OpenLayers.Bounds(-496534.93559273,4333062.2588617,3446392.7307635,6081941.4657133);

    // Mercator layers
    /* gmap = new OpenLayers.Layer.Google("Google Streets",{'sphericalMercator': true});
    gphy = new OpenLayers.Layer.Google("Google Terrain",{type: G_PHYSICAL_MAP, 'sphericalMercator': true});
    gsat = new OpenLayers.Layer.Google("Google Satellite",{type: G_SATELLITE_MAP, 'sphericalMercator': true, numZoomLevels: 22});
    ghyb = new OpenLayers.Layer.Google("Google Hybrid",{type: G_HYBRID_MAP, 'sphericalMercator': true});*/
    osm  = new OpenLayers.Layer.OSM("Open Street Map");

    map.addLayers([/*gphy, gmap, gsat, ghyb,*/osm]);
    
    mapControls = {
    	line: new OpenLayers.Control.Measure(OpenLayers.Handler.Path, {persist: true}),
    	polygon: new OpenLayers.Control.Measure(OpenLayers.Handler.Polygon, {persist: true}),
    	pan: new OpenLayers.Control.Pan({title:"Pan"}),
    	zoomin: new OpenLayers.Control.ZoomBox({title:"Zoom in box", out: false}),
    	zoomout: new OpenLayers.Control.ZoomBox({title:"Zoom out box", out: true})
    };
    
    
    for(var key in mapControls) {
		control = mapControls[key];
		control.events.on({
		    "measure": handleMeasurements,
		    "measurepartial": handleMeasurements
		});
		map.addControl(control);
    }
    map.addControl(new OpenLayers.Control.Navigation({'zoomWheelEnabled': false}));
    map.addControl(new OpenLayers.Control.MousePosition({div:document.getElementById("coord")}));
    
    //Storico navigazione
    var history = new OpenLayers.Control.NavigationHistory();
    map.addControl(history);
    
    var btnPrev = new OpenLayers.Control.Panel({
        div: document.getElementById("btnPrev"),
        displayClass:"prev"
    });
    var btnNext = new OpenLayers.Control.Panel({
        div: document.getElementById("btnNext"),
        displayClass:"next"
    });
    
    map.addControl(btnPrev);
    btnPrev.addControls([history.previous]);
    map.addControl(btnNext);
    btnNext.addControls([history.next]);

    //Centra la mappa all'apertura 
    if (!map.getCenter()) {map.zoomToExtent(bounds);}
}

function handleMeasurements(event) {
    var geometry = event.geometry;
    var units = event.units;
    var order = event.order;
    var measure = event.measure;
    var element = document.getElementById('output'); 
    var out = "";
    if(order == 1) {
		out += "Lunghezza " + measure.toFixed(3) + " " + units;
    } else {
		out += "Area " + measure.toFixed(3) + " " + units + "2";
    }
    element.innerHTML = out;
}

function toggleControl(element) {
    for(key in mapControls) {
	var control = mapControls[key];
	//alert ($(element).is('.ui-state-active'));
	if(element.name == key && $(element).is('.ui-state-active')) {
	    control.activate();
	} else {
	    control.deactivate();
	}
    }
}

function myFunction () {
	alert('ciao');
}

