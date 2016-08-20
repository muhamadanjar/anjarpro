var RBI_CONST = "RUPABUMI INDONESIA";
var url_rbi = "http://services.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer";
var TOPO_CONST = "ESRI TOPO";
var url_topo = "http://services.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer";
var STREET_CONST = "ESRI STREET";
var url_street = "http://services.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer";
var IMAGERY_CONST = "ESRI IMAGERY";
var url_imagery = "http://services.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer";
var NATGEO_CONST = "NATIONAL GEOGRAPHIC";
var url_natgeo = "http://services.arcgisonline.com/arcgis/rest/services/NatGeo_World_Map/MapServer";
var BING_AERIAL_CONST = "BING AERIAL";
var BING_AERIAL_LABEL_CONST = "BING AERIAL LABEL";
var BING_ROAD_CONST = "BING ROAD";
var bm_key = "AhjrmRxg_0dpbRrCGKSFIHEjpKhyNCFgesIZ6RHz4gTo8W4BNOuQ_F_ksj-dow3i";
var xmin = 87.4951171875;
var ymin = -15.52294921875;
var xmax = 147.5244140625;
var ymax = 13.78857421875;
var WKID_CONST = 4326;
var ZOOM_CONST = 2;
var kabupaten_flag = false;
var kecamatan_flag = false;
var wilayah_flag = false;
var detail_flag = true;
var identify_flag = false;
var measurement_flag = false;
var kabupaten_text_open = "Tampilkan Kabupaten";
var kabupaten_text_close = "Sembunyikan Kabupaten";
var kecamatan_text_open = "Tampilkan Kecamatan";
var kecamatan_text_close = "Sembunyikan Kecamatan";
var wilayah_text_open = "Tampilkan Semua";
var wilayah_text_close = "Sembunyikan Semua";
var previos_basemap = RBI_CONST;
var current_basemap = RBI_CONST;
var url_service_kecamatan = "http://jdsd.kaltimprov.go.id:6080/arcgis/rest/services/RBI/Batas_Hover_Kaltim/MapServer";
var ID_KEC = "kec_kaltim";
var l_kec;
var url_service_kabupaten = "http://jdsd.kaltimprov.go.id:6080/arcgis/rest/services/RBI/Nama_Geografi_Kaltim/MapServer";
var ID_KAB = "kab_kaltim";
var l_kab;
var map;
var scalebar;
var overviewMapDijit;
var geocoder;
var legend;
var measurement;
var legendLayers = [];
var serviceArray;
var initExtentAndSR;
var sr;
var graphicKabupatenLayer;
var graphicKecamatanLayer;
var query, queryTask;
require(["dojo/on", "dijit/Dialog", "esri/geometry/webMercatorUtils", "esri/geometry/Point", "esri/map", "esri/dijit/Popup", "esri/layers/ArcGISTiledMapServiceLayer", "esri/dijit/Basemap", "esri/SpatialReference", "esri/geometry/Extent", "esri/dijit/Legend", "esri/dijit/Measurement", "esri/dijit/Scalebar", "esri/dijit/OverviewMap", "esri/dijit/Geocoder", "esri/dijit/InfoWindow", "esri/tasks/QueryTask", "esri/tasks/query", "esri/toolbars/draw", "esri/layers/FeatureLayer", "esri/layers/ArcGISDynamicMapServiceLayer", "esri/arcgis/utils", "esri/virtualearth/VETiledLayer", "dojo/parser", "dijit/layout/BorderContainer", "dijit/layout/ContentPane", "dijit/TitlePane", "dojo/domReady!"], function (on, Dialog, webMercatorUtils, Point, Map, Popup, ArcGISTiledMapServiceLayer, Basemap, SpatialReference, Extent, Legend, Measurement, Scalebar, OverviewMap, Geocoder, InfoWindow, QueryTask, Query, Draw, FeatureLayer, ArcGISDynamicMapServiceLayer, arcgisUtils, VETiledLayer, parser) {
    parser.parse();
    sr = new SpatialReference({
        "wkid": WKID_CONST
    });
    initExtentAndSR = new Extent(xmin, ymin, xmax, ymax, sr);
    initMap(ZOOM_CONST, initExtentAndSR);
    var l_rbi = new ArcGISTiledMapServiceLayer(url_rbi, {
        id: RBI_CONST
    });
    var l_topo = new ArcGISTiledMapServiceLayer(url_topo);
    var l_street = new ArcGISTiledMapServiceLayer(url_street);
    var l_imagery = new ArcGISTiledMapServiceLayer(url_imagery);
    var l_natgeo = new ArcGISTiledMapServiceLayer(url_natgeo);
    var l_bing_aerial = new VETiledLayer({
        bingMapsKey: bm_key
        , mapStyle: VETiledLayer.MAP_STYLE_AERIAL
    });
    var l_bing_aerial_label = new VETiledLayer({
        bingMapsKey: bm_key
        , mapStyle: VETiledLayer.MAP_STYLE_AERIAL_WITH_LABELS
    });
    var l_bing_road = new VETiledLayer({
        bingMapsKey: bm_key
        , mapStyle: VETiledLayer.MAP_STYLE_ROAD
    });
    l_kec = new ArcGISDynamicMapServiceLayer(url_service_kecamatan, {
        id: ID_KEC
    });
    l_kab = new ArcGISDynamicMapServiceLayer(url_service_kabupaten, {
        id: ID_KAB
    });
    map.addLayer(l_rbi);
    graphicKecamatanLayer = new esri.layers.GraphicsLayer();
    map.addLayer(graphicKecamatanLayer);
    legend = new Legend({
        map: map
        , layerInfos: legendLayers
    }, "legendDiv");
    legend.startup();
    measurement = new Measurement({
        map: map
    }, "measurementDiv");
    measurement.startup();
    geocoder = new Geocoder({
        map: map
        , autoComplete: true
        , arcgisGeocoder: {
            placeholder: "Cari Lokasi"
            , sourceCountry: "Indonesia"
        }
    }, "search");
    geocoder.startup();

    function initMap(z, x) {
        var popup = new Popup({
            fillSymbol: new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([255, 0, 0]), 2), new dojo.Color([255, 255, 0, 0.25]))
        }, dojo.create("div"));
        map = new esri.Map("mapDiv", {
            zoom: z
            , extent: x
            , infoWindow: popup
        });
        scalebar = new Scalebar({
            map: map
            , attachTo: "bottom-left"
            , scalebarUnit: "metric"
        });
        overviewMapDijit = new OverviewMap({
            map: map
            , width: 150
            , height: 130
            , visible: true
        });
        overviewMapDijit.startup();
        dojo.connect(map, "onExtentChange", setExtent);
        dojo.connect(map, "onUpdateStart", function () {
            $("#loader")
                .html(image_loader + "<br /> Sedang mengakses resource..");
            $("#loader")
                .dialog("open")
        });
        dojo.connect(map, "onUpdateEnd", function () {
            $("#loader")
                .dialog("close")
        });
        map.on("click", function (evt) {
            if (identify_flag) {
                identify(evt)
            }
        })
    }

    function setExtent(extent) {
        if (extent.xmin > 360) extent = webMercatorUtils.webMercatorToGeographic(extent);
        xmin = extent.xmin;
        ymin = extent.ymin;
        xmax = extent.xmax;
        ymax = extent.ymax
    }
    on(dojo.byId("imageryButton"), "click", function (evt) {
        if (current_basemap == IMAGERY_CONST) {
            alert("BASEMAP SUDAH " + IMAGERY_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = IMAGERY_CONST;
            changeBasemap(l_imagery, getZoomEsri(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("natgeoButton"), "click", function (evt) {
        if (current_basemap == NATGEO_CONST) {
            alert("BASEMAP SUDAH " + NATGEO_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = NATGEO_CONST;
            changeBasemap(l_natgeo, getZoomEsri(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("topoButton"), "click", function (evt) {
        if (current_basemap == TOPO_CONST) {
            alert("BASEMAP SUDAH " + TOPO_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = TOPO_CONST;
            changeBasemap(l_topo, getZoomEsri(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("streetButton"), "click", function (evt) {
        if (current_basemap == STREET_CONST) {
            alert("BASEMAP SUDAH " + STREET_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = STREET_CONST;
            changeBasemap(l_street, getZoomEsri(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("bingAerialButton"), "click", function (evt) {
        if (current_basemap == BING_AERIAL_CONST) {
            alert("BASEMAP SUDAH " + BING_AERIAL_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = BING_AERIAL_CONST;
            changeBasemap(l_bing_aerial, getZoomBing(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("bingAerialLabelButton"), "click", function (evt) {
        if (current_basemap == BING_AERIAL_LABEL_CONST) {
            alert("BASEMAP SUDAH " + BING_AERIAL_LABEL_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = BING_AERIAL_LABEL_CONST;
            changeBasemap(l_bing_aerial_label, getZoomBing(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("bingRoadButton"), "click", function (evt) {
        if (current_basemap == BING_ROAD_CONST) {
            alert("BASEMAP SUDAH " + BING_ROAD_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = BING_ROAD_CONST;
            changeBasemap(l_bing_road, getZoomBing(previos_basemap, map.getZoom()))
        }
    });
    on(dojo.byId("rbiButton"), "click", function (evt) {
        if (current_basemap == RBI_CONST) {
            alert("BASEMAP SUDAH " + RBI_CONST)
        } else {
            previos_basemap = current_basemap;
            current_basemap = RBI_CONST;
            changeBasemap(l_rbi, getZoomRbi(previos_basemap, map.getZoom()))
        }
    });

    function changeBasemap(layer, i) {
        y = new Extent(xmin, ymin, xmax, ymax, sr);
        scalebar.destroy();
        overviewMapDijit.destroy();
        map.destroy();
        initMap(i, y);
        if (identify_flag) {
            map.setMapCursor("help")
        } else {
            map.setMapCursor("default")
        }
        legend.map = map;
        measurement.map = map;
        geocoder.map = map;
        map.addLayer(layer);
        var c = $.map($("#tree3")
            .dynatree("getSelectedNodes")
            , function (node) {
                return node.data.key
            });
        showOperationalLayers(c.join(", "))
    }

    function getZoomEsri(x, y) {
        switch (x) {
        case RBI_CONST:
            return getZoomEsriConvertFromRBI(y);
            break;
        case BING_AERIAL_CONST:
        case BING_AERIAL_LABEL_CONST:
        case BING_ROAD_CONST:
            return getZoomEsriConvertFromBing(y);
            break;
        default:
            return y
        }
    }

    function getZoomBing(x, y) {
        switch (x) {
        case RBI_CONST:
            return getZoomBingConvertFromRBI(y);
            break;
        case NATGEO_CONST:
        case IMAGERY_CONST:
        case TOPO_CONST:
        case STREET_CONST:
            return getZoomBingConvertFromEsri(y);
            break;
        default:
            return y
        }
    }

    function getZoomRbi(x, y) {
        switch (x) {
        case NATGEO_CONST:
        case IMAGERY_CONST:
        case TOPO_CONST:
        case STREET_CONST:
            return getZoomRBIConvertFromEsri(y);
            break;
        case BING_AERIAL_CONST:
        case BING_AERIAL_LABEL_CONST:
        case BING_ROAD_CONST:
            return getZoomRBIConvertFromBing(y);
            break;
        default:
            return y
        }
    }

    function getZoomEsriConvertFromRBI(n) {
        switch (n) {
        case 0:
            return 4;
            break;
        case 1:
            return 5;
            break;
        case 2:
        case 3:
            return 6;
            break;
        case 4:
            return 7;
            break;
        case 5:
            return 9;
            break;
        case 6:
        case 7:
            return 10;
            break;
        case 8:
            return 11;
            break;
        case 9:
        case 10:
        case 11:
        case 12:
            return 13;
            break;
        default:
            return 5
        }
    }

    function getZoomEsriConvertFromBing(n) {
        return n + 1
    }

    function getZoomBingConvertFromRBI(n) {
        switch (n) {
        case 0:
            return 3;
            break;
        case 1:
            return 4;
            break;
        case 2:
        case 3:
            return 5;
            break;
        case 4:
            return 6;
            break;
        case 5:
            return 8;
            break;
        case 6:
        case 7:
            return 9;
            break;
        case 8:
            return 10;
            break;
        case 9:
        case 10:
        case 11:
        case 12:
            return 12;
            break;
        default:
            return 4
        }
    }

    function getZoomBingConvertFromEsri(n) {
        return n - 1
    }

    function getZoomRBIConvertFromEsri(n) {
        switch (n) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            return 0;
            break;
        case 5:
            return 1;
            break;
        case 6:
            return 2;
            break;
        case 7:
            return 4;
            break;
        case 8:
        case 9:
            return 5;
            break;
        case 10:
            return 7;
            break;
        case 11:
            return 8;
            break;
        case 12:
            return 9;
            break;
        case 13:
            return 10;
            break;
        default:
            return 1
        }
    }

    function getZoomRBIConvertFromBing(n) {
        switch (n) {
        case 0:
        case 1:
        case 2:
        case 3:
            return 0;
            break;
        case 4:
            return 1;
            break;
        case 5:
            return 2;
            break;
        case 6:
            return 4;
            break;
        case 7:
        case 8:
            return 5;
            break;
        case 9:
            return 7;
            break;
        case 10:
            return 8;
            break;
        case 11:
            return 9;
            break;
        case 12:
            return 10;
            break;
        case 13:
            return 11;
            break;
        default:
            return 1
        }
    }
});

function showOperationalLayers(selKeys) {
    $("#loader")
        .dialog("open");
    serviceArray = new Array();
    var mapLayers = map.layerIds.length;
    for (var j = mapLayers - 1; j >= 0; j--) {
        legendLayers.pop();
        var layer = map.getLayer(map.layerIds[j]);
        if (layer.id !== RBI_CONST) {
            if (layer.url.indexOf("arcgisonline") <= 0 && layer.url.indexOf("virtualearth") <= 0) map.removeLayer(layer)
        }
    }
    dojo.forEach(selKeys.split(","), function (selKey) {
        if ($.trim(selKey)
            .substring(0, 4) == "http") {
            if ($.trim(selKey)
                .indexOf("*") < 0) {
                var dynamicMapServiceLayer = new esri.layers.ArcGISDynamicMapServiceLayer($.trim(selKey), {
                    opacity: 0.8
                });
                legendLayers.push({
                    layer: dynamicMapServiceLayer
                });
                map.addLayer(dynamicMapServiceLayer);
                serviceArray.push($.trim(selKey) + "/0")
            } else {
                var url = $.trim(selKey)
                    .split("*");
                var dynamicMapServiceLayer = new esri.layers.ArcGISDynamicMapServiceLayer(url[0], {
                    opacity: 0.8
                });
                dynamicMapServiceLayer.setVisibleLayers([url[1]]);
                legendLayers.push({
                    layer: dynamicMapServiceLayer
                });
                map.addLayer(dynamicMapServiceLayer);
                serviceArray.push(url[0] + "/" + url[1])
            }
        }
    });
    if (kecamatan_flag) map.addLayer(l_kec);
    if (kabupaten_flag) map.addLayer(l_kab);
    legend.refresh();
    $("#loader")
        .dialog("close")
}

function identify(a) {
    var b;
    var c = [];
    dojo.forEach(serviceArray, function (e) {
        var f = new esri.tasks.IdentifyParameters();
        var h = e.substring(e.lastIndexOf("/") + 1, e.length);
        var g = e.substring(0, e.lastIndexOf("/"));
        f.tolerance = 3;
        f.returnGeometry = true;
        f.layerIds = [h];
        f.layerOption = esri.tasks.IdentifyParameters.LAYER_OPTION_ALL;
        f.width = map.width;
        f.height = map.height;
        f.geometry = a.mapPoint;
        f.mapExtent = map.extent;
        var d = new esri.tasks.IdentifyTask(g);
        b = d.execute(f);
        objIndex = 0;
        b.addCallback(function (i) {
            return dojo.map(i, function (j) {
                var k = j.feature;
                k.attributes.layerName = j.layerName;
                var l = new esri.InfoTemplate();
                l.setTitle("Identify Result");
                l.setContent(getResult);
                k.setInfoTemplate(l);
                return k
            })
        });
        c.push(b)
    });
    map.infoWindow.setFeatures(c);
    map.infoWindow.show(a.mapPoint)
}

function getResult(a) {
    var b = "<table width=\"100%\">";
    $.each(a, function (c, d) {
        if (c == "attributes") {
            $.each(d, function (e, f) {
                b += "<tr><th align=\"left\" width=75 nowrap style=\"font-size:11px\" valign=\"top\">" + e + "</th><th width=10 nowrap style=\"font-size:11px\" valign=\"top\">:</th><td style=\"font-size:11px\">" + f + "</td></tr>"
            })
        }
    });
    b += "</table>";
    return b
};
$(function () {
    myLayout = $("#contain")
        .layout({
            west__size: .20
            , onresize: function () {
                map.reposition();
                return false
            }
        });
    map.reposition();
    hideCariLayer();
    hideTambahServer();
    $("#close_details")
        .click(function () {
            close_west();
            hide_detail()
        });
    $("#closeCariLayer")
        .click(function () {
            close_west()
        });
    $("#doneCariLayer")
        .click(function () {
            hideCariLayer();
            show_detail();
            $("#myTab a[href=\"#messages\"]")
                .tab("show")
        });
    $("#closeTambahServer")
        .click(function () {
            close_west()
        });
    $("#button_detail")
        .click(function () {
            if (detail_flag) {
                hide_detail();
                close_west()
            } else {
                show_detail();
                hideCariLayer();
                hideTambahServer();
                open_west()
            }
        });
    $("#buttonCariLayer")
        .click(function () {
            showCariLayer()
        });
    $("#buttonTambahServer")
        .click(function () {
            showTambahServer()
        });
    $("#button_identify")
        .click(function () {
            if (identify_flag) hide_identify();
            else show_identify()
        });
    $("#button_measurement")
        .click(function () {
            if (measurement_flag) hide_measurement();
            else show_measurement()
        });
    $("#button_fullscreen")
        .click(function () {
            goFullscreen("contain")
        });
    if (wilayah_flag) {
        $("#wilayah_semua")
            .html(wilayah_text_close);
        showKabupaten();
        showKecamatan();
        $("#wilayah_kabupaten")
            .html(kabupaten_text_close);
        $("#wilayah_kecamatan")
            .html(kecamatan_text_close)
    } else {
        hideKabupaten();
        hideKecamatan();
        $("#wilayah_semua")
            .html(wilayah_text_open);
        $("#wilayah_kabupaten")
            .html(kabupaten_text_open);
        $("#wilayah_kecamatan")
            .html(kecamatan_text_open)
    }
    if (kabupaten_flag) {
        showKabupaten();
        $("#wilayah_kabupaten")
            .html(kabupaten_text_close)
    } else {
        hideKabupaten();
        $("#wilayah_kabupaten")
            .html(kabupaten_text_open)
    }
    if (kecamatan_flag) {
        showKecamatan();
        $("#wilayah_kecamatan")
            .html(kecamatan_text_close)
    } else {
        hideKecamatan();
        $("#wilayah_kecamatan")
            .html(kecamatan_text_open)
    }
    $("#loader")
        .dialog({
            autoOpen: false
            , modal: true
        });
    $("#dialogMeasurement")
        .dialog({
            autoOpen: measurement_flag
            , width: 310
            , minHeight: 160
            , maxHeight: 200
            , position: {
                my: "left top"
                , at: "right-470 top"
                , of: "#mapDiv"
            }
            , close: function (event, ui) {
                hide_measurement()
            }
            , hide: {
                effect: "explode"
                , duration: 1000
            }
        });
    $("#wilayah_kecamatan")
        .click(function () {
            if (kecamatan_flag == false) {
                showKecamatan();
                kecamatan_flag = true;
                $("#wilayah_kecamatan")
                    .html(kecamatan_text_close);
                if (kabupaten_flag) {
                    wilayah_flag = true;
                    $("#wilayah_semua")
                        .html(wilayah_text_close)
                }
            } else {
                hideKecamatan();
                kecamatan_flag = false;
                $("#wilayah_kecamatan")
                    .html(kecamatan_text_open);
                wilayah_flag = false;
                $("#wilayah_semua")
                    .html(wilayah_text_open)
            }
        });
    $("#wilayah_kabupaten")
        .click(function () {
            if (kabupaten_flag == false) {
                showKabupaten();
                kabupaten_flag = true;
                $("#wilayah_kabupaten")
                    .html(kabupaten_text_close);
                if (kecamatan_flag) {
                    wilayah_flag = true;
                    $("#wilayah_semua")
                        .html(wilayah_text_close)
                }
            } else {
                hideKabupaten();
                kabupaten_flag = false;
                $("#wilayah_kabupaten")
                    .html(kabupaten_text_open);
                wilayah_flag = false;
                $("#wilayah_semua")
                    .html(wilayah_text_open)
            }
        });
    $("#wilayah_semua")
        .click(function () {
            if (wilayah_flag == false) {
                wilayah_flag = true;
                $("#wilayah_semua")
                    .html(wilayah_text_close);
                showKabupaten();
                kabupaten_flag = true;
                $("#wilayah_kabupaten")
                    .html(kabupaten_text_close);
                showKecamatan();
                kecamatan_flag = true;
                $("#wilayah_kecamatan")
                    .html(kecamatan_text_close)
            } else {
                wilayah_flag = false;
                $("#wilayah_semua")
                    .html(wilayah_text_open);
                hideKabupaten();
                kabupaten_flag = false;
                $("#wilayah_kabupaten")
                    .html(kabupaten_text_open);
                hideKecamatan();
                kecamatan_flag = false;
                $("#wilayah_kecamatan")
                    .html(kecamatan_text_open)
            }
        });

    function showKecamatan() {
        map.addLayer(l_kec)
    }

    function showKabupaten() {
        map.addLayer(l_kab)
    }

    function hideKecamatan() {
        map.removeLayer(l_kec)
    }

    function hideKabupaten() {
        map.removeLayer(l_kab)
    }

    function hide_detail() {
        detail_flag = false;
        $("#details")
            .hide();
        $("#button_detail")
            .removeClass("btn-success active")
            .addClass("btn-default")
    }

    function show_detail() {
        detail_flag = true;
        $("#details")
            .show();
        $("#button_detail")
            .removeClass("btn-default")
            .addClass("btn-success active")
    }

    function close_west() {
        myLayout.hide("west");
        map.reposition()
    }

    function open_west() {
        myLayout.show("west");
        map.reposition()
    }

    function show_identify() {
        identify_flag = true;
        map.setMapCursor("help");
        $("#button_identify")
            .removeClass("btn-default")
            .addClass("btn-success active")
    }

    function hide_identify() {
        identify_flag = false;
        map.setMapCursor("default");
        $("#button_identify")
            .removeClass("btn-success active")
            .addClass("btn-default")
    }

    function hide_measurement() {
        $("#dialogMeasurement")
            .dialog("close");
        measurement_flag = false;
        $("#button_measurement")
            .removeClass("btn-success active")
            .addClass("btn-default")
    }

    function show_measurement() {
        measurement_flag = true;
        $("#dialogMeasurement")
            .dialog("open");
        $("#button_measurement")
            .removeClass("btn-default")
            .addClass("btn-success active")
    }

    function hideCariLayer() {
        $("#cariLayer")
            .hide()
    }

    function showCariLayer() {
        hide_detail();
        hideTambahServer();
        open_west();
        $("#cariLayer")
            .show()
    }

    function hideTambahServer() {
        $("#tambahServer")
            .hide()
    }

    function showTambahServer() {
        hide_detail();
        hideCariLayer();
        open_west();
        $("#tambahServer")
            .show()
    }

    function goFullscreen(id) {
        var element = document.getElementById(id);
        if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen()
        } else if (element.webkitRequestFullScreen) {
            element.webkitRequestFullScreen()
        }
    }
    var treeData = [{
        title: "Badan Informasi Geospasial"
        , isFolder: true
        , key: "id3"
        , children: [{
            title: "IGD"
            , children: [{
                title: "RBI"
                , children: []
            }]
        }]
    }, {
        title: "Kementerian"
        , isFolder: true
        , key: "id3"
        , children: [{
            title: "Kementerian Pekerjaan Umum"
            , children: [{
                title: "SDA"
                , children: []
            }]
        }, {
            title: "Kementerian Kehutanan"
            , children: [{
                title: "Kawasan Hutan"
                , children: []
            }]
        }, {
            title: "Kementerian Pertanian"
            , children: [{
                title: "Hortikultura"
                , children: []
            }]
        }]
    }, {
        title: "Lembaga"
        , isFolder: true
        , key: "id3"
        , children: [{
            title: "KPU"
            , children: []
        }]
    }, {
        title: "Provinsi"
        , isFolder: true
        , key: "id3"
        , expand: true
        , children: [{
            title: "Kalimantan Timur"
            , expand: true
            , children: [{
                title: "Pertanian"
                , children: [{
                    title: "Potensi Pangan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Pertanian_Perkebunan/MapServer*0"
                }, {
                    title: "Produksi Jagung Tahun 2007-2012"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Pertanian_Perkebunan/MapServer*3"
                }, {
                    title: "Kawasan Budidaya Pertanian Tanaman Pangan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*5"
                }, {
                    title: "Kawasan Tanaman Padi Tahun 2007-2012"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Pertanian_Perkebunan/MapServer*2"
                }, {
                    title: "Kawasan Eksisting Pertanian Tanaman Pangan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Pertanian_Perkebunan/MapServer*1"
                }]
            }, {
                title: "Perkebunan"
                , children: [{
                    title: "Kawasan Perkebunan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*6"
                }]
            }, {
                title: "Administrasi"
                , children: [{
                    title: "Batas Kabupaten/Kota"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*4"
                }, {
                    title: "Ibukota Kecamatan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*0"
                }, {
                    title: "Batas Negara"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*6"
                }, {
                    title: "Sungai"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*7"
                }, {
                    title: "Tubuh Air"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*11"
                }, {
                    title: "Batas Provinsi"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*5"
                }, {
                    title: "Data Kecamatan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Data_Kecamatan/MapServer*0"
                }, {
                    title: "Ibukota Kabupaten/Kota"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*1"
                }, {
                    title: "Ibukota Provinsi"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Admin_Kaltim/MapServer*2"
                }]
            }, {
                title: "Biofisik"
                , children: [{
                    title: "Morfologi"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/morfologi/MapServer"
                }, {
                    title: "Ekosistem Karst"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/kars/MapServer"
                }, {
                    title: "Estimasi Karbon Tahun 2009"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/CARBONESTIMASI_250K/MapServer*1"
                }, {
                    title: "Estimasi Karbon Tahun 2011"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/CARBONESTIMASI_250K/MapServer*0"
                }, {
                    title: "Kontur"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Kontur/MapServer"
                }]
            }, {
                title: "Ekonomi"
                , children: [{
                    title: "Produk Domestik Regional Bruto Atas Dasar Harga Berlaku Minyak dan Gas Tahun 2009-2012"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/PDRB_ADHK_Migas_dan_PDRB_ADHB_Migas_2009_2012/MapServer*1"
                }, {
                    title: "Produk Domestik Regional Bruto Atas Dasar Harga Konstan Minyak dan Gas Tahun 2009-2012"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/PDRB_ADHK_Migas_dan_PDRB_ADHB_Migas_2009_2012/MapServer*0"
                }]
            }, {
                title: "Pertambangan dan Energi"
                , children: [{
                    title: "Eksploitasi Batu Bara"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Eksplorasi_dan_eksploitasi/MapServer*1"
                }, {
                    title: "Eksplorasi Batu Bara"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Eksplorasi_dan_eksploitasi/MapServer*0"
                }]
            }, {
                title: "Rawan Bencana"
                , children: [{
                    title: "Titik Panas NOAA-18 (27 Januari 2015)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*4"
                }, {
                    title: "Titik Panas NOAA-18 (27 Oktober 2014)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*1"
                }, {
                    title: "Titik Panas NOAA-18 (27 September 2014)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*2"
                }, {
                    title: "Titik Panas NOAA-18 (27 Agustus 2014)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*0"
                }, {
                    title: "Titik Panas NOAA-18 (27 Desember 2014)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*5"
                }, {
                    title: "Titik Panas NOAA-18 (27 Februari 2015)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*6"
                }, {
                    title: "Titik Panas NOAA-18 (27 November 2014)"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Hotspot_Aug14_Feb14/MapServer*3"
                }]
            }, {
                title: "Infrastruktur"
                , children: [{
                    title: "Pelabuhan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*1"
                }, {
                    title: "Bandar Udara"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*0"
                }, {
                    title: "Rencana Jalan Bebas Hambatan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*6"
                }, {
                    title: "Rencana Rel Kereta Api"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Renc_Jalur_KA_Kaltim/MapServer"
                }, {
                    title: "Jalan Nasional"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*2"
                }, {
                    title: "Jalan Provinsi"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*3"
                }, {
                    title: "Jalan Rencana dan Non Status"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Infrastruktur_06_02_15/MapServer*4"
                }]
            }, {
                title: "Kehutanan"
                , children: [{
                    title: "SK Menteri Kehutanan No. 718"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/SK_No_718/MapServer"
                }]
            }, {
                title: "Perikanan"
                , children: [{
                    title: "Kawasan Perikanan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*3"
                }]
            }, {
                title: "Permukiman"
                , children: [{
                    title: "Kawasan Permukiman"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*4"
                }, {
                    title: "Bantuan Perumahan Untuk Rumah Tidak Layak Huni Tahun 2009-2013"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Rumah_Layak_Huni/MapServer*0"
                }]
            }, {
                title: "Industri"
                , children: [{
                    title: "Titik Kawasan Industri"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Titik_Kawasan_Industri/MapServer*0"
                }, {
                    title: "Kawasan Industri"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*1"
                }]
            }, {
                title: "Pariwisata"
                , children: [{
                    title: "Kawasan Pariwisata"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/peruntukan_ruang/MapServer*2"
                }]
            }, {
                title: "Pola Ruang"
                , children: [{
                    title: "Konservasi Mangrove"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Kawasan_Lindung/MapServer*2"
                }, {
                    title: "Konservasi Laut/Padang Lamun"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Kawasan_Lindung/MapServer*3"
                }, {
                    title: "Hutan lindung"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Kawasan_Lindung/MapServer*1"
                }, {
                    title: "Taman Nasional dan Cagar Alam"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/Kawasan_Lindung/MapServer*0"
                }]
            }, {
                title: "Struktur Ruang"
                , children: [{
                    title: "Pembangkit Listrik"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/sistem_jaringan_energi/MapServer*0"
                }, {
                    title: "PU Perencanaan"
                    , key: "http://penataanruangkaltim.com/ArcGIS/rest/services/Perencanaan/MapServer"
                }, {
                    title: "PU Pengendalian"
                    , key: "http://penataanruangkaltim.com/ArcGIS/rest/services/Pengendalian/MapServer"
                }, {
                    title: "Pusat-Pusat Kegiatan"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/PUSAT_PUSAT_KEGIATAN/MapServer*0"
                }, {
                    title: "Rencana Jaringan Listrik"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/sistem_jaringan_energi/MapServer*2"
                }, {
                    title: "Gardu Induk Listrik"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/sistem_jaringan_energi/MapServer*1"
                }, {
                    title: "Jalur Pipa Gas"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/sistem_jaringan_energi/MapServer*4"
                }, {
                    title: "Jaringan Listrik"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/sistem_jaringan_energi/MapServer*3"
                }]
            }, {
                title: "Kawasan Strategis"
                , children: [{
                    title: "Kawasan Strategis Provinsi"
                    , key: "http://222.124.31.141:6080/arcgis/rest/services/KSP/MapServer*0"
                }]
            }]
        }]
    }, {
        title: "Kabupaten/Kota"
        , isFolder: true
        , key: "id3"
        , children: []
    }];
    $("#tree3")
        .dynatree({
            checkbox: true
            , selectMode: 3
            , children: treeData
            , onSelect: function (a, b) {
                var c = $.map(b.tree.getSelectedNodes(), function (d) {
                    return d.data.key
                });
                showOperationalLayers(c.join(", "))
            }
            , onDblClick: function (b, a) {
                b.toggleSelect()
            }
            , onKeydown: function (b, a) {
                if (a.which == 32) {
                    b.toggleSelect();
                    return false
                }
            }
            , cookieId: "dynatree-Cb3"
            , idPrefix: "dynatree-Cb3-"
        })
});
