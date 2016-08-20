<title>Map Viewer AnjarPro</title>
<link rel="stylesheet" href="{{ asset('vendor/ol3/ol.css')}}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/map_openlayers.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/ol3-popup/ol3-popup.css') }}" />
<link href="{{ asset('londinium/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="vendor/jquery-layout/layout-default-latest.css" />
<link rel="stylesheet" href="vendor/jqueryui/css/redmond/jquery-ui-1.10.4.custom.min.css" />
<link href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}">

<script type="text/javascript" src="{{ asset('vendor/jqueryui/js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jqueryui/js/jquery-ui-1.10.4.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('londinium/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('lib/proj4js/proj4.js') }}"></script>
<script src="{{ asset('lib/reqwest.min.js') }}"></script>
<script src="{{ asset('vendor/ol3/ol.js') }}"></script>
<script src="{{ asset('vendor/ol3-popup/ol3-popup.js') }}"></script>
<script src="{{ asset('vendor/jquery-layout/jquery.layout-latest.js')}}" type="text/javascript" ></script>

<div id="loading"></div>

<div ng-app='app'>

<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
    <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            	<img src="images/logo.png" class="navbar-brand-image">
            	Map Viewer </a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              
              	<li><a href="#" onclick="ZoomToLayer('rth','publik')">Link</a></li>
              	<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                  <li><a onclick="getimagelayer()" href="#">Action</a></li>

	                  <li><a onclick="ZoomToLayerManual()" href="#">Another action</a></li>

	                  <li><a href="#">Another action</a></li>

	                  <li><a href="#">Another action</a></li>

	                  <li><a href="#">Something else here</a></li>
	                  <li class="divider"></li>
	                  <li><a href="#">Separated link</a></li>
	                  <li class="divider"></li>
	                  <li><a href="#">One more separated link</a></li>
	                </ul>
              	</li>
            </ul>

            <form class="navbar-form navbar-left form-search" name="form-search" id="form-search" action="">
              <div class="form-group" ng-controller="searchCtrl">
                
                <input type="text" id="textSearch" class="form-control" ng-model="selectedlayer" 
                typeahead="layer as layer.namalayer for layer in getLayer($viewValue) | filter:$viewValue | limitTo:3" 
                placeholder="Search for an Layer">
                <button type="button" id="btn-search" class="btn btn-default btn-search">Submit</button>
              </div>
              

            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">

                  <li><a href="{{ url('dashboard') }}">Dashboard</a></li>

                  
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="navbar-offset"></div>

<div class="row" id="contain">
    <div class="col-md-4 pane ui-layout-west">
        	<button id="collapse-init" class="btn btn-primary">
			    Disable accordion behavior
			</button>
	        <div class="panel-group" id="accordion">
			    <!-- First Panel -->
			    <div class="panel panel-default">
			        <div class="panel-heading">
			             <h4 class="panel-title"
			                 data-toggle="collapse" 
			                 data-target="#collapseOne">
			                 Layer
			             </h4>
			        </div>
			        <div id="collapseOne" class="panel-collapse collapse">
			            <div class="panel-body">

			                <div id="layertree" class="tree list-group"></div>

			               

			            </div>
			        </div>
			    </div>
			    
			    <!-- Second Panel -->
			    <div class="panel panel-default">
			        <div class="panel-heading">
			             <h4 class="panel-title" 
			                 data-toggle="collapse" 
			                 data-target="#collapseInfo">
			                 Info
			             </h4>
			        </div>
			        <div id="collapseInfo" class="panel-collapse collapse">
			            <div class="panel-body">
			            	<form class="form-search-raw" id="form-search-raw" role="search">
              					<div class="form-group">
			            		<input type="text" class="form-control textSearchRaw" class="form-control" placeholder="Search">
			            		<button type="button" class="btn btn-default btn-search" onClick="updateFilter()">Submit</button>
			            		</div>
			                	<select name="identify" id="identify" class="form-control">
			                		<option value="all">All</option>
			                	</select>
			                </form>

			            </div>
			        </div>
			    </div>
			    
			    <!-- Third Panel -->
			    <div class="panel panel-default">
			        <div class="panel-heading">
			             <h4 class="panel-title"
			                 data-toggle="collapse"
			                 data-target="#collapseThree">
			                 Collapsible Group Item #3
			             </h4>
			        </div>
			        <div id="collapseThree" class="panel-collapse collapse">
			            <div class="panel-body">

			                <div id="table-layer"></div>
			                <div id="myposition"></div>
			                <table id="tableResult" class="tableResult">
			                	<tr>
			                		<td>Nama Layer</td>
			                		<td>#</td>
			                	</tr>
			                	<tr>
			                		<td>Nama Layer</td>
			                		<td>#</td>
			                	</tr>
			                </table>

			            </div>
			        </div>
			    </div>
			    
			</div>

			                

			
    </div>
    <div class="col-md-5 ui-layout-center" id="map">
        
    </div>

</div>

</div>
<script type="text/javascript" src="lib/search.js"></script>
<script type="text/javascript" src="lib/map_openlayerv2.js"></script>






