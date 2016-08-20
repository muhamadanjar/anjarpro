app.service('mapService', function () {

	var view,map;
	this.getMaps = function () {
        return map;
    };
    this.initMap = function() {
    	view = new ol.View({
            //center: ol.proj.transform([-100.1833, 41.3833], 'EPSG:4326', 'EPSG:3857'),
            zoom: 4,
            projection: ol.proj.get('EPSG:4326'),
            center: [106.81, -6.6],
        });
		map = new ol.Map({
            target: 'map',
            renderer: 'canvas', 
            layers: [],
            view: view,
        });
    };
})