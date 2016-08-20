@extends('app2')

@section('content')
<link rel="stylesheet" href="{{ asset('vendor/ol3/ol.css')}}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/map_openlayers.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/ol3-popup/ol3-popup.css') }}" />


<script src="{{ asset('lib/proj4js/proj4.js') }}"></script>
<script src="{{ asset('lib/reqwest.min.js') }}"></script>
<script src="{{ asset('vendor/ol3/ol.js') }}"></script>
<script src="{{ asset('vendor/ol3-popup/ol3-popup.js') }}"></script>

<div id="loading"></div>
<div class="row">
    <div class="col-md-4">
        <div id="layertree" class="tree"></div>
    </div>
    <div class="col-md-8">
        <div id="map" class="map"></div>
    </div>
</div>

<script type="text/javascript" src="lib/map_openlayerv2.js"></script>

@stop
