<title>Login Editor</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS-->
{!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
<div class="account">
<div class="container">
	
	
	<div class="row">
		
		<div class="col-sm-offset-3 col-sm-6 col-md-4 col-md-offset-4">
			<div class="account-wall">
	            <i class="user-img icons-faces-users-03"></i>
	            <img src="{{ asset('images/logo_login.png') }}"  class="img-responsive" alt="Kabupaten Bogor">
	            <form class="form-signin" role="form" role="form" method="POST" action="{{ url('/login/editor') }}">            
	               	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	               	<div class="append-icon">
	                    <input type="text" name="username" id="name" class="form-control form-white username" placeholder="Username" value="{{ old('username') }}" required>
	                    <i class="icon-user"></i>
	                </div>
	                <div class="append-icon m-b-20">
	                    <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
	                    <i class="icon-lock"></i>
	                </div>
	                <button type="submit" id="submit-form" class="btn btn-lg btn-simtaru btn-block ladda-button" data-style="expand-left">Sign In</button>
	                           
	                <div class="clearfix">
	                    <p class="pull-right m-t-20"><a><input type="checkbox" name="remember"> Remember Me</a></p>
	                </div> 
	            </form>
	            	@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Ada beberapa masalah dengan apa yang Anda input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif               
	        </div>
		</div>
	</div>
</div>
</div>

{!! HTML::script('vendor/jquery/jquery.min.js'); !!}
{!! HTML::script('vendor/bootstrap/js/bootstrap.min.js'); !!}

