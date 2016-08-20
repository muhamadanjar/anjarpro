@extends('app2')
@section('content')
<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Modul</h6></div>
    <div class="panel-body">             
		<div class="row">
            <div class="col-md-7">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="moduleid" value="{{ $modul->moduleid }}">
                        <div class="form-group">
                            <label for="modulename" class="col-md-2 control-label">Nama Modul</label>
                            <div class="col-md-8">
                                 <input id="modulename" name="modulename" class="form-control" value="{{ $modul->modulename }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="moduleslug" class="col-md-2 control-label">Modul Slug</label>
                            <div class="col-md-4">
                                 <input id="moduleslug" name="moduleslug" class="form-control" value="{{ $modul->moduleslug }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="modulefile" class="col-md-2 control-label">Nama Modul</label>
                            <div class="col-md-5">
                                 <input id="modulefile" name="modulefile" class="form-control" value="{{ $modul->modulefile }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="urutan" class="col-md-2 control-label">Urutan</label>
                            <div class="col-md-1">
                                 <input id="urutan" name="urutan" class="form-control" value="{{ $modul->urutan }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Menu </label>
                            <div class="col-sm-5">
                                <select name="moduleparentid" class="select-full" >
                                    <option value="0">----</option>
                                    @foreach($modulselect as $key => $para)
                                     
                                        @if($modul->moduleparentid == $para->moduleid)
                                        <option value="{{ $para->moduleid }}" selected="selected">{{ $para->modulename }}</option> 
                                        @else
                                        <option value="{{ $para->moduleid }}">{{ $para->modulename }}</option> 
                                        @endif
                                        
                                    @endforeach 
                                   
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status: </label>
                            <div class="col-sm-5">
                                <select name="status" class=" select-full" tabindex="2">
                                    
                                    @if($modul->status == 1)
                                        <option value=""></option> 
                                        <option value="1" selected="selected">Aktif</option> 
                                        <option value="0">Non Aktif</option>
                                    @elseif($modul->status == 0)
                                        <option value=""></option> 
                                        <option value="1">Aktif</option> 
                                        <option value="0" selected="selected">Non Aktif</option>
                                    @else
                                        <option value=""></option> 
                                        <option value="1">Aktif</option> 
                                        <option value="0">Non Aktif</option>
                                    @endif
                                    
                                     
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Type: </label>
                            <div class="col-sm-4">
                                <select name="type" data-placeholder="Status..." class="select-full" tabindex="2">
                                    @if($modul->type == 'admin')
                                    <option value=""></option> 
                                    <option value="admin" selected="selected">Admin</option> 
                                    <option value="public">Public</option>
                                    @elseif($modul->type == 'public')
                                    <option value=""></option> 
                                    <option value="admin">Admin</option> 
                                    <option value="public" selected="selected">Public</option>
                                    @else
                                    <option value=""></option> 
                                    <option value="admin">Admin</option> 
                                    <option value="public">Public</option> 
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-md-2 control-label">Icon</label>
                            <div class="col-md-4">
                                <input id="icon" name="icon" class="form-control" value="{{ $modul->icon }}"/>
                                <select data-placeholder="Choose a Country..." 
                                class="select-full" tabindex="2">
                                    <option value=""></option> 
                                    <option value="icon-zoom-out2">
                                        <i class="icon-zoom-out2"></i>icon-zoom-out2
                                    </option>
                                    <option value="icon-zoom-out">
                                        <i class="icon-zoom-out"></i>icon-zoom-out
                                    </option>
                                    <option value="icon-zoom-in2">
                                        <i class="icon-zoom-in2"></i>icon-zoom-in2
                                    </option>
                                    <option value="icon-zoom-in">
                                        <i class="icon-zoom-in"></i>icon-zoom-in
                                    </option>
                                     
                                    
                                </select>
                            </div>
                        </div>


                       
                        

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    
                    
            </div>
            <div class="col-md-2"></div>
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