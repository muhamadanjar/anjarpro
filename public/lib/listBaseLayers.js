//Define layers
var LISTTopographic = new L.tileLayer("https://services.thelist.tas.gov.au/arcgis/rest/services/Basemaps/Topographic/ImageServer/tile/{z}/{y}/{x}", {
    attribution: "Topographic Basemap from <a href=http://www.thelist.tas.gov.au>the LIST</a> &copy State of Tasmania",
    maxZoom: 20,
    maxNativeZoom: 18
});

var LISTAerial = new L.tileLayer("https://services.thelist.tas.gov.au/arcgis/rest/services/Basemaps/Orthophoto/ImageServer/tile/{z}/{y}/{x}", {
    attribution: "Base Imagery from <a href=http://www.thelist.tas.gov.au>the LIST</a> &copy State of Tasmania",
    maxZoom: 20,
    maxNativeZoom: 19
});

var esriTopoUrl = 'http://services.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}';
var esriTopo = L.tileLayer(esriTopoUrl, {minZoom: 5,maxZoom: 18});

var esriStreetUrl = 'http://services.arcgisonline.com/arcgis/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}';
var esriStreet = L.tileLayer(esriStreetUrl, {minZoom: 5,maxZoom: 18});

var esriNatgeoUrl = 'http://services.arcgisonline.com/arcgis/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
var esriNatgeo = L.tileLayer(esriNatgeoUrl, {minZoom: 5,maxZoom: 18});

var esriBCUrl = 'http://services.arcgisonline.com/arcgis/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}';
var esriBC = new L.tileLayer(esriBCUrl, {minZoom: 5,maxZoom: 18});

var baselocal = new L.TileLayer.WMS("localhost:8080" + "/geoserver/gwc/service/wms", {
    layers: "kab_bogor:Administrasi_Kabupaten_Bogor",
    format: 'image/png',
   	transparent: true,
    maxZoom: 20,
});