@extends('app2')
@section('content')
<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-users"></i> Add User</h6>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">             
		<div class="row">
            <div class="col-md-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Username</label>
                            <div class="col-md-8">
                                 <input id="username" name="username" class="form-control"/>
                            </div>
                    </div>
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Nama Lengkao</label>
                            <div class="col-md-8">
                                 <input id="name" name="name" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-8">
                                 <input id="email" name="email" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-8">
                                 <input id="password" type="password" name="password" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Level</label>
                            <div class="col-md-8">
                                {!! $level !!}
                            </div>
                        </div>
  
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>      
            </div>
        </div>
        </form>
    </div>
    
</div>
@stop