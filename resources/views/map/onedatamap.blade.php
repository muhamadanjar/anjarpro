<!DOCTYPE html>
<html>
	<head>
		<title>
			Geoportal Provinsi Kalimantan Timur
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
		<link rel="icon" href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="http://onedataonemap.kaltimprov.go.id/arcgis_js_api/library/3.8/3.8/js/dojo/dijit/themes/nihilo/nihilo.css">
		<link rel="stylesheet" href="http://onedataonemap.kaltimprov.go.id/arcgis_js_api/library/3.8/3.8/js/esri/css/esri.css">
		<link href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<link href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/css/ui.dynatree.css" rel="stylesheet">
		<link rel="stylesheet" href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/themes/redmond/jquery.ui.all.css" />
		<link type="text/css" rel="stylesheet" href="http://onedataonemap.kaltimprov.go.id/geoportal/asset/jquerylayout/layout-default-latest.css" />
		<style>
			html, body, #mapDiv
			{
				padding: 0;
				height: 100%;
				overflow: hidden;
			}
			.dijitDialogUnderlay
			{
				display: none;
			}
			#search_input
			{
				box-shadow: 0 0 0 rgba(0,0,0,0.075) inset;
				transition: border 0 linear 0,box-shadow 0 linear 0
			}
			.basemapGal
			{
				cursor: pointer;
				text-align: center;
			}
			.o
			{
				margin-bottom: 10px;
				background-color: white;
				color: #000;
				font-family: arial;
				height: auto;
				overflow: hidden;
				padding: 5px;
				bottom: 7%;
				width: 230px;
				z-index: 40;
				-moz-box-shadow: 0 0 5px #888;
				-webkit-box-shadow: 0 0 5px #888;
				box-shadow: 0 0 5px #888;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
				border: 1px solid #fff;
				font-size: small;
			}
			.ltcol,.ctcol
			{
				float: left;
				text-align: center
			}
			.rtcol
			{
				float: right;
				text-align: center
			}
			#contain {
		background:	#999;
		height:		92%;
		margin:		-1px auto;
		width:		100%;
		overflow: hidden;
	}
	h4{
		margin-top:0px;
	}

		</style>

		<script type="text/javascript" src="http://onedataonemap.kaltimprov.go.id/arcgis_js_api/library/3.8/3.8/init.js">
		</script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/bootstrap.min.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery.cookie.js" type="text/javascript" ></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/js/jquery.dynatree.min.js" type="text/javascript" ></script>
		<script src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/jquerylayout/jquery.layout-latest.js" type="text/javascript" ></script>

		<script>
			var image_loader= '<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/ajax-loader.gif" alt="loader" />';
		</script>
	</head>
	<body class="nihilo" style="padding:5px;font-size:12px;">
<div data-dojo-type="dijit/layout/BorderContainer"
         data-dojo-props="design:'headline', gutters:false"
         style="width:100%;height:100%;margin:0;">


<div style="padding:0 5px 0 5px;">
	<div style="border-right:solid 1px #000;display:inline; margin-right:5px;padding:5px;">
	<img alt="logo kaltim" src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/LOGO_PROV.png">
	</div>
	 <h4 style="display:inline">Geoportal Provinsi Kalimantan Timur</h4>
	<div class="btn-group" style="float:right;margin-right:	10px;">

<div class="btn-group" >
    <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" style="border:none;background:none">
      Wilayah Administrasi
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
				<li role="presentation">
					<a
						role="menuitem" tabindex="-1" href="#" id="wilayah_semua">
					</a>
				</li>
				<li role="presentation" class="divider">
				</li>
				<li role="presentation">
					<a
						role="menuitem" tabindex="-1" href="#" id="wilayah_kabupaten">
					</a>
				</li>
				<li role="presentation" class="divider">
				</li>
				<li role="presentation">
					<a
						role="menuitem" tabindex="-1" href="#" id="wilayah_kecamatan">
					</a>
				</li>
    </ul>
  </div>
  <div class="btn-group" >
    <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" style="border:none;background:none">
      Links
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">

			<li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://onedataonemap.kaltimprov.go.id/geoportal/">Kembali ke Web OneMap</a>
                    </li>
                    <li role="presentation" class="divider">
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://onedataonemap.kaltimprov.go.id/geoportal/index.php/viewer/sektoral/ekonomi">Sektor Ekonomi</a>
                    </li>
                    <li role="presentation" class="divider">
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://onedataonemap.kaltimprov.go.id/geoportal/index.php/viewer/sektoral/industri">Sektor Industri</a>
                    </li>
                    <li role="presentation" class="divider">
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://onedataonemap.kaltimprov.go.id/geoportal/index.php/viewer/sektoral/infrastruktur">Sektor Infrastruktur</a>
                    </li>
                    <li role="presentation" class="divider">
                    </li>
                    <li role="presentation">
                        <a target="_blank" role="menuitem" tabindex="-1" href="http://onedataonemap.kaltimprov.go.id/geoportal/index.php/viewer/sektoral/sosbud">Sektor Sosial Budaya</a>
                    </li>
    </ul>
  </div>
</div>
	</div>
	<div style="background:#eee;border:solid 1px #aaa;border-top-left-radius:10px;border-top-right-radius:10px;margin-top:3px;padding:5px 10px 5px 10px;">
	<div class="btn-group">
		<button id="button_detail" type="button" class="btn btn-sm btn-success active">Detail</button>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-plus"></span> Tambah Layer <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
		<li><a href="#" id="buttonCariLayer">Cari Layer</a></li>
				</ul>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-th-large"></span> Basemap <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu" style="width:300px;padding:5px;">
			<div style="padding:5px 5px 5px 5px;margin-bottom:5px;border-bottom:solid #000 1px;">Pilih Basemap</div>
			<table cellpadding="8" cellspacing="8" border="0">
			<tr height="100"><td width="100" valign="top" align="center"><div id="rbiButton" title="Basemap RBI" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/rupabumi.png" width="60" height="45"><br />
				Rupabumi <br/>Indonesia
			</div></td><td width="100" valign="top" align="center">			<div id="imageryButton" title="Basemap Topo" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/imagery.jpg" width="60" height="45"><br />
				ESRI <br/>Imagery
			</div>
</td><td width="100" valign="top" align="center">			<div id="topoButton" title="Basemap Topo" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/topo.jpg" width="60" height="45"><br />
				ESRI <br/>Topo
			</div>
</td></tr>
			<tr height="100"><td valign="top" align="center">			<div id="streetButton" title="Basemap Street" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/street.jpg" width="60" height="45"><br />
				ESRI <br/>Street
			</div>
</td><td valign="top" align="center">			<div id="natgeoButton" title="Basemap Natgeo" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/natgeo.jpg" width="60" height="45"><br />
				National <br/>Geographic
			</div>
</td><td valign="top" align="center">			<div id="bingAerialButton" title="Basemap Aerial" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/aerial.png" width="60" height="45"><br />
				Bing <br/>Aerial
			</div>
</td></tr>
<tr height="100"><td valign="top" align="center">		<div id="bingAerialLabelButton" title="Basemap Hybrid" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/hybrid.png" width="60" height="45"><br />Bing Aerial <br/>Label
			</div>
	</td><td valign="top" align="center">		<div id="bingRoadButton" title="Basemap Road" class="basemapGal">
				<img src="http://onedataonemap.kaltimprov.go.id/geoportal/asset/images/viewer/road.png" width="60" height="45"><br />Bing <br/>Road
			</div>
</td><td></td></tr>
			</table>	
		</ul>
	</div>
	<div class="btn-toolbar" role="toolbar" style="float:right;width:auto;">
      	  <div class="btn-group">
        <button id="button_identify" class="btn btn-sm btn-default" type="button" title="Identify"><span class="glyphicon glyphicon-info-sign"></span> Identify</button>
                <button id="button_measurement" class="btn btn-sm btn-default" type="button" title="Measurement"><span class="glyphicon glyphicon-screenshot"></span> Measurement</button>
			  </div>
	  <div class="input-group">
	  <div id="search"></div>
      </div>
	</div>
 					
	</div>
		
<div id="contain">
	<div id="mapDiv" class="ui-layout-center"></div>
	<div class="pane ui-layout-west">
		<div id="details">
	 		<button id="close_details" class="btn btn-xs btn-default" type="button" style="float:right;display:block;border:none;" ><span class="glyphicon glyphicon-remove"></span></button>
			<ul id="myTab" class="nav nav-pills">
			  	<li class="active"><a href="#home" data-toggle="pill"><span class="glyphicon glyphicon-question-sign" title="Cara Penggunaan"></span></a></li>
			  	<li><a href="#messages" data-toggle="pill"><span class="glyphicon glyphicon-list-alt" title="Legenda Peta"></span></a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content" style="padding:5px;margin-top:5px; ">
			  	<div class="tab-pane active" id="home" style="height:450px; overflow:auto;'">
					<h4 style="border-bottom: #000 solid 1px;padding-bottom:3px;">Cara Penggunaan </h4>
					<div style="text-align:justify;">Cara pengoperasian geoportal ini sangatlah mudah. Ikuti langkah-langkah berikut:</div><br />
					<ol>
						<li><strong>Pilih area</strong><br />
							Arahkan dan perbesar peta ke suatu tempat atau lakukan pencarian tempat berdasarkan nama atau alamat</li>
						<li><strong>Tentukan apa yang ingin ditampilkan</strong><br /> 
							Pilih  Basemap lalu Tambahkan Layer yang diinginkan.</li>
						<li><strong>Gunakan tools yang tersedia</strong><br />
							Tersedia tools untuk identify, measurement, dan analysis untuk membantu pekerjaan Anda.
						</li>
					</ol>
				</div>
				<div class="tab-pane" id="messages" style="height:450px; overflow:auto;'">
					<h4 style="border-bottom: #000 solid 1px;padding-bottom:3px;">Legenda Peta</h4>
					<div id="legendDiv"></div>
				</div>
			  
			</div>
		 
		</div>
		<div id="cariLayer" style="padding-top:0px;">
			<button id="closeCariLayer" class="btn btn-xs btn-default" type="button" style="float:right;display:block;border:none;" ><span class="glyphicon glyphicon-remove"></span></button>
	
			<h4 style="border-bottom: #000 solid 1px;padding-bottom:3px;">Cari Layer </h4>
			<div id="tree3" style="height:450px;overflow:auto;"></div>
			<br />
			<button id="doneCariLayer" class="btn btn-sm btn-default form-control" type="button" ><span class="glyphicon glyphicon-ok-sign"></span> Selesai Menambahkan Layer</button>
		</div>

		<div id="tambahServer">
	 		<button id="closeTambahServer" class="btn btn-xs btn-default" type="button" style="float:right;display:block;border:none;" ><span class="glyphicon glyphicon-remove"></span></button>

			<h4 style="border-bottom: #000 solid 1px;padding-bottom:3px;">Tambah Server</h4>
	
			<table>
				<tr>
					<td width="70">
						<label for="name">Name </label>
					</td>
					<td>
						<div class="dijit dijitReset dijitInline dijitLeft dijitTextBox" id="widget_serverName" role="presentation" widgetid="serverName"><div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" data-dojo-attach-point="textbox,focusNode" autocomplete="off" name="serverName" type="text" tabindex="0" id="serverName" value=""></div></div>
					</td>
				</tr>
				<tr>
					<td><label for="name">Url </label></td>
					<td>
						<div class="dijit dijitReset dijitInline dijitLeft dijitTextBox" id="widget_serverUrl" role="presentation" widgetid="serverUrl"><div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" data-dojo-attach-point="textbox,focusNode" autocomplete="off" name="serverUrl" type="text" tabindex="0" id="serverUrl" value=""></div></div>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;
					</td>
					<td>
						<span class="dijit dijitReset dijitInline dijitButton" role="presentation" widgetid="submitUrl"><span class="dijitReset dijitInline dijitButtonNode" data-dojo-attach-event="ondijitclick:_onClick" role="presentation"><span class="dijitReset dijitStretch dijitButtonContents" data-dojo-attach-point="titleNode,focusNode" role="button" aria-labelledby="submitUrl_label" tabindex="0" id="submitUrl"><span class="dijitReset dijitInline dijitIcon dijitNoIcon" data-dojo-attach-point="iconNode"></span><span class="dijitReset dijitToggleButtonIconChar">●</span><span class="dijitReset dijitInline dijitButtonText" id="submitUrl_label" data-dojo-attach-point="containerNode">Submit</span></span></span><input type="button" value="" class="dijitOffScreen" tabindex="-1" role="presentation" data-dojo-attach-point="valueNode"></span>
						<span class="dijit dijitReset dijitInline dijitButton" role="presentation" widgetid="dijit_form_Button_2"><span class="dijitReset dijitInline dijitButtonNode" data-dojo-attach-event="ondijitclick:_onClick" role="presentation"><span class="dijitReset dijitStretch dijitButtonContents" data-dojo-attach-point="titleNode,focusNode" role="button" aria-labelledby="dijit_form_Button_2_label" tabindex="0" id="dijit_form_Button_2"><span class="dijitReset dijitInline dijitIcon dijitNoIcon" data-dojo-attach-point="iconNode"></span><span class="dijitReset dijitToggleButtonIconChar">●</span><span class="dijitReset dijitInline dijitButtonText" id="dijit_form_Button_2_label" data-dojo-attach-point="containerNode">Reset</span></span></span><input type="reset" value="" class="dijitOffScreen" tabindex="-1" role="presentation" data-dojo-attach-point="valueNode"></span>
					</td>
				</tr>
			</table>
		</div>
  
	</div>
	 
</div>

</div>
	</div>
		<div id="dialogMeasurement" title="Measurement Tool">
			<div id="measurementDiv"></div>
		</div>
	<div id="loader" style="text-align: center" title="Tunggu sebentar.."></div>

<script>

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

;</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582AaN6h071sG%2bCUB9gs7mibFD14NUhFYLn3MZV3SWvyauJVzcS5zbSaenr%2fFb%2blZWk9auhMKJdJdZsYhCy5LEQK8cBtIH%2f08b8T5V1X%2fiMI4K2KYerPizbz47yuCVj5GLsP2TDXuf8dWFQOUOBm4Th%2bmHLKaNRljxG5N5i%2frE%2b%2bvyDdrHMiD4PXuA99AxR8xx3Qi9hKXtUGCkl87cnOyQ8vm%2bYlA4Gxsfk0d7w2aLOehETEzET%2bzg%2f9FKPZ4hmu3Pp07UBp%2fYaxRYPbI4RePAYyJXqDxdg4yxQ7v5Co7xqy7E3z84%2bq7Bw7kPuXwhDEJhcVsdTkOY%2fowrR9ITcl10A0O3Sr%2bV28X9bA6J9VapOj1SycMhh6gA%2fPaTFkHbK6fiNAUYzQw1%2br5aIQmoRjzXsbtRlqWVtwOK8Ujbp0Sk43jz6au9TutZzucv%2bEIo2B2TKlPffGhdpVfTyEgJNsVs1Tc9wGHzHWs8wT%2fgQJ1M13Mo56CP90pRuz5IbjAQfkz4Q%2fQKBaKColE7AXg6vyw%2bBJi8w%2bYFxrqooVX8ACdjgRKp" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>

