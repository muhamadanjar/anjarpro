@extends('app2')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file"></i> Tags</h6>
    </div>
    <div class="panel-body">             
		<div class="row">
            <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Ada data yang masih kosong
                        </div>
                    @else
                        
                    @endif
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Tags</label>
                            <div class="col-md-8">
                                 <input id="name" name="name" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</div>
@stop