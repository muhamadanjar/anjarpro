@extends('app2')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Layer Esri</h6></div>
    <div class="panel-body"> 
        <form class="form-horizontal rth" method="post" role="form" enctype="multipart/form-data">            
		<div class="row">
            <div class="col-md-9">        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_layer" value="">
                        <div class="form-group">
                            <label for="layername" class="col-md-2 control-label">Nama Layer</label>
                            <div class="col-md-5">
                                 <input id="layername" name="layername" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layerurl" class="col-md-2 control-label">Layer URL</label>
                            <div class="col-md-8">
                                 <input id="layerurl" name="layerurl" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layer" class="col-md-2 control-label">Layer</label>
                            <div class="col-md-8">
                                 <input id="layer" name="layer" class="required form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="na" class="col-md-2 control-label">Non Aktif</label>
                            <div class="col-md-8">
                                <label class="checkbox-primary">
                                    <input type="checkbox" class="styled" value="1" name="na">
                                </label> 
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_grouplayer" class="col-md-2 control-label">Group Layer</label>
                            <div class="col-md-1">
                                 <input id="id_grouplayer" value="0" name="id_grouplayer" class="required form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orderlayer" class="col-md-2 control-label">Urutan Layer</label>
                            <div class="col-md-2">
                                 <input id="orderlayer" name="orderlayer" type="number" class="required form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tipelayer" class="col-md-2 control-label">Tipe Layer</label>
                            <div class="col-md-2">
                                <select name="tipelayer" class="form-control">
                                     <option value="-">------</option>
                                     <option value="dynamic">dynamic</option>
                                     <option value="feature">feature</option>
                                     <option value="image">image</option>
                                     <option value="tiled">tiled</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="option_opacity" class="col-md-2 control-label">Opacity</label>
                            <div class="col-md-1">
                            <input id="option_opacity" name="option_opacity" class="required form-control"/></div>
                            <div class="col-md-5">
                                 
                                 <div id="slider"></div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="option_visible" class="col-md-2 control-label">Layer Visible</label>
                            <div class="col-md-8">  
                                <label class="checkbox-primary">
                                    <input type="checkbox" class="styled" value="1" name="option_visible" checked="checked">
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="option_mode" class="col-md-2 control-label">Mode Layer</label>
                            <div class="col-md-3">
                                
                                <select name="option_mode" class="form-control">
                                    <option value="0">0 - MODE_SNAPSHOT</option>
                                    <option value="1">1 - MODE_ONDEMAND</option>
                                    <option value="2">2 - MODE_SELECTION</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jsonfield" class="col-md-2 control-label">Json</label>
                            <div class="col-md-8">
                                 <input id="jsonfield" name="jsonfield" class="required form-control"/>
                            </div>
                        </div>

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
                            {!! $role !!}        
                    </div>
                                
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop