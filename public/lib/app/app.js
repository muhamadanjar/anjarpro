var map,view;var layerOSM,PetaDasar;
var indonesiaEx = [93.970693781,-18.25167354,139.863065517,13.537752547];
var bogorEx = [106.604388339,-6.71663787,107.003690281,-6.438022028];
var overlaysOBJ;

var app = angular.module('app', ['ui.bootstrap'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('API_URL', 'http://localhost/anjarpro/web/api/');;

$(function() {
	$("#contain")
        .layout({
            west__size: .20,
            onresize: function () {
                map.updateSize();
                return false
            }
        });
});