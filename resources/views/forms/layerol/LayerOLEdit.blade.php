@extends('app2')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Layer Esri</h6></div>
    <div class="panel-body"> 
        <form class="form-horizontal rth" method="post" role="form" enctype="multipart/form-data" action="{{ route('layerolsaveedit') }}">            
		<div class="row">
            <div class="col-md-9">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="layerid" value="{{ $layer->layerid }}">
                    <div class="form-group">
                        <label for="namalayer" class="col-md-2 control-label">Nama Layer</label>
                        <div class="col-md-5">
                            <input id="namalayer" name="namalayer" class="required form-control" value="{{ $layer->namalayer }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="urllayer" class="col-md-2 control-label">Url Layer</label>
                        <div class="col-md-5">
                            <input id="urllayer" name="urllayer" value="/geoserver/wms" class="required form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="source_layer" class="col-md-2 control-label">Source Layer</label>
                        <div class="col-md-5">
                            <input id="source_layer" name="source_layer" value="{{ $layer->source_layer }}" class="required form-control source_layer" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="source_tiled" class="col-md-2 control-label">Tile layer</label>
                        <div class="col-md-1">
                            <input type="checkbox" class="styled" value="1" name="source_tiled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="layervisible" class="col-md-2 control-label">Layer Visible</label>
                        <div class="col-md-1">
                            <input type="checkbox" class="styled" value="1" name="layervisible">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="layeropacity" class="col-md-2 control-label">Layer Opacity</label>
                        <div class="col-md-2">
                            <input type="hidden" class="styled" value="{{ $layer->layeropacity }}" name="layeropacity" id="layeropacity">
                            <div id="slider_opacity"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="urutan" class="col-md-2 control-label">Urutan</label>
                        <div class="col-sm-2 col-md-2">
                            <input type="text" id="spinner-default" class="form-control" value="{{ $layer->urutan }}" name="urutan">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="extent" class="col-md-2 control-label">Extent</label>
                        <div class="col-md-2">
                            <input type="text" class="styled form-control" value="1" name="x_min" id="x_min" value="{{ $layer->x_min }}">  
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="styled form-control" value="1" name="y_min" id="y_min" value="{{ $layer->y_min }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="styled form-control" value="1" name="x_max" id="x_max" value="{{ $layer->x_max }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="styled form-control" value="1" name="y_max" id="y_max" value="{{ $layer->y_max }}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="btnLoadextent" class="btn btn-default btnLoadextent">
                                Load Extent
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="tipelayer" value="tilewms" />
                    
                    <div class="form-group">
                        <div class="col-md-11 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Hak Akses</h6></div>
                    <div class="panel-body">
                                
                    </div>
                                
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop