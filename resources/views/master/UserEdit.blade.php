@extends('app2')
@section('content')
<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-users"></i> Edit User</h6>
    </div>
    <div class="panel-body">
    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">             
		<div class="row">
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Username</label>
                            <div class="col-md-8">
                                 <input id="username" name="username" class="form-control" value="{{ $users->username }}" />
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Nama Lengkap</label>
                            <div class="col-md-8">
                                 <input id="name" name="name" class="form-control" value="{{ $users->name }}"/>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-8">
                                 <input id="email" name="email" class="form-control" value="{{ $users->email }}"/>
                            </div>
                    </div>

                    <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-8">
                                <input type="hidden" name="oldpassword" value="{{ $users->password }}" />
                                <input id="password" type="password" name="password" class="form-control" value="{{ $users->password }}"/>
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
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                  
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title"><i class="icon-users"></i> Level User</h6>
                    </div>
                    <div class="panel-body">
                      
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@stop