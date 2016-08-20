@extends('app2')
@section('content')
<form class="form-horizontal validate" method="post" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-insert-template"></i> Modul</h6></div>
    <div class="panel-body">             
		<div class="row">
            <div class="col-md-7">               
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="modulename" class="col-md-2 control-label">Nama Modul</label>
                    <div class="col-md-8">
                        <input id="modulename" name="modulename" class="required form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="moduleslug" class="col-md-2 control-label">Modul Slug</label>
                    <div class="col-md-4">
                        <input id="moduleslug" name="moduleslug" class="required form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="modulefile" class="col-md-2 control-label">Modul File</label>
                    <div class="col-md-4">
                        <input id="modulefile" name="modulefile" class="required form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="urutan" class="col-md-2 control-label">Urutan</label>
                    <div class="col-md-1">
                        <input id="urutan" name="urutan" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Menu </label>
                    <div class="col-sm-5">
                        <select name="moduleparentid" data-placeholder="Root Menu..." class="select-full" tabindex="2">
                            <option value="0">----Root Menu----</option>
                            @foreach($modulselect as $key => $para)
                                <option value="{{ $para->moduleid }}">{{ $para->modulename }}</option> 
                            @endforeach 
                                   
                        </select>
                     </div>
                </div>      
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status: </label>
                    <div class="col-sm-3">
                        <select name="status" class="form-control">
                            <option value=""></option> 
                            <option value="1">Aktif</option> 
                            <option value="0">Non Aktif</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Type: </label>
                    <div class="col-sm-5">
                        <select name="type" data-placeholder="Status..." class="select-full" tabindex="2">
                            <option value=""></option> 
                            <option value="admin">Admin</option> 
                            <option value="public">Public</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon" class="col-md-2 control-label">Icon</label>
                    <div class="col-md-4">
                        <input id="icon" name="icon" class="form-control"/>
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
                        {!! $level !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@stop