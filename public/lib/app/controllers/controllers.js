app.controller('searchCtrl', function($scope, $http, API_URL) {

    $scope.getLayer = function(term) {
        return $http.get(API_URL+'search/' + term).then(function(data) {
            return data.data;
        });
    };
        
});

app.controller('mapCtrl', function($scope, $http, API_URL) {
	layerOSM = new ol.layer.Tile({
        source: new ol.source.OSM(),
        name: 'OpenStreetMap',
        id: 'osm'
    });
    PetaDasar = new ol.layer.Group({
        layers: [layerOSM],
        name: 'Peta Dasar',
        id:'base'
    });
    view = new ol.View({
        //center: ol.proj.transform([-100.1833, 41.3833], 'EPSG:4326', 'EPSG:3857'),
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
    
    $scope.getLayer = function(term) {
        return $http.get(API_URL+'getLayer').then(function(data) {
            return data.data;
        });
    };
        
});