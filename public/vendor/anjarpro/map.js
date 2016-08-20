(function($) {
	if (typeof jQuery === 'undefined') { throw new Error('Bootstrap\'s JavaScript requires jQuery') }
	if (typeof ol === 'undefined') { throw new Error('Openlayers\'s JavaScript requires') }
	// Create layers instances
    var layerOSM = new ol.layer.Tile({
        source: new ol.source.OSM(),
        name: 'OpenStreetMap',
        id: 'osm'
    });

    var BingMapRoad = new ol.layer.Tile({
        source: new ol.source.BingMaps({key:'AsxtakN7WqZ-AjpgvhxvrHgENDh-spnL7HIh3SaLOzmDjN8J4AO-PeSU-j7Ssav0',imagerySet:'Road'}),
        name:'BingMap Road',
        visible: true,
        id:'bingmaproad'
    });
            
    var layerMQ = new ol.layer.Tile({
        source: new ol.source.MapQuest({
            layer: 'osm'
        }),
        name: 'MapQuest',
        id:'MQ'
    });

    var EsriTopo = new ol.layer.Tile({
        source: new ol.source.XYZ({
                    //attributions: [attribution],
            url: 'http://services.arcgisonline.com/ArcGIS/rest/services/' +
            'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
        }),
        name:'EsriTopo',
        id:'EsriTopo'
    });

	var PetaDasar = new ol.layer.Group({
        layers: [layerOSM,layerMQ,BingMapRoad,EsriTopo],
        name: 'Peta Dasar',
        id:'base'
    });

	$.fn.map.defaults = {
	    imagerySetA :[
                'Road',
                'Aerial',
                'AerialWithLabels',
                'collinsBart',
                'ordnanceSurvey'
            ],
        indonesiaEx :[93.970693781,-18.25167354,139.863065517,13.537752547],
        bogorEx :[106.604388339,-6.71663787,107.003690281,-6.438022028],
        overlaysOBJ:null,
        BingMapsKeys:'AsxtakN7WqZ-AjpgvhxvrHgENDh-spnL7HIh3SaLOzmDjN8J4AO-PeSU-j7Ssav0',
        zoomMap:4,
	};

	$.fn.map = function(options) {

        var opts = $.extend( {}, $.fn.map.defaults, options );

        initMap();
    }

	initMap = function() {
        view = new ol.View({
            zoom: 4,
            projection: ol.proj.get('EPSG:4326'),
            center: [106.81, -6.6],
        });

        map = new ol.Map({
            target: 'map', 
            renderer: 'canvas', 
            layers: [PetaDasar, /*layerStm,*/],
            view: view,
        });


    }

}(JQuery));