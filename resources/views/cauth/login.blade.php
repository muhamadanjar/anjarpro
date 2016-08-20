
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>anjarPro - Login</title>

<link rel="shortcut icon" href="{{ url('images/logo.png') }}" />
@include('helper/css')
@include('helper/script')

</head>
<body class="full-width page-condensed">

					@if (count($errors) > 0)
						<div class="bg-danger with-padding">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<strong>Whoops!</strong> Ada beberapa masalah dengan apa yang Anda input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					

					<!-- Navbar -->
					<div class="navbar navbar-inverse" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
								<span class="sr-only">Toggle navbar</span>
								<i class="icon-grid3"></i>
							</button>
							<!--<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>-->
						</div>

						<!--<ul class="nav navbar-nav navbar-right collapse">
							<li><a href="#"><i class="icon-screen2"></i></a></li>
							<li><a href="#"><i class="icon-paragraph-justify2"></i></a></li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
				                <ul class="dropdown-menu icons-right dropdown-menu-right">
									<li><a href="#"><i class="icon-cogs"></i> This is</a></li>
									<li><a href="#"><i class="icon-grid3"></i> Dropdown</a></li>
									<li><a href="#"><i class="icon-spinner7"></i> With right</a></li>
									<li><a href="#"><i class="icon-link"></i> Aligned icons</a></li>
				                </ul>
							</li>
						</ul>-->
					</div>
					<!-- /navbar -->

					<!-- Login wrapper -->
					<div class="login-wrapper">
				    	<form action="#" role="form" method="post" action="{{ url('/cauth/login') }}">
				    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="popup-header">
								<a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
								<span class="text-semibold">User Login</span>
								<div class="btn-group pull-right">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
				                    <ul class="dropdown-menu icons-right dropdown-menu-right">
										<li><a href="#"><i class="icon-people"></i> Change user</a></li>
										<li><a href="#"><i class="icon-info"></i> Forgot password?</a></li>
										<li><a href="#"><i class="icon-support"></i> Contact admin</a></li>
										<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
				                    </ul>
								</div>
							</div>
							<div class="well">
								<div class="form-group has-feedback">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
									<i class="icon-users form-control-feedback"></i>
								</div>

								<div class="form-group has-feedback">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
									<i class="icon-lock form-control-feedback"></i>
								</div>

								<div class="row form-actions">
									<div class="col-xs-6">
										<div class="checkbox checkbox-success">
										<label>
											<input type="checkbox" class="styled" name="remember">
											Remember me
										</label>
										</div>
									</div>

									<div class="col-xs-6">
										<button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Sign in</button>
									</div>
								</div>
							</div>
				    	</form>
					</div>  
					<!-- /login wrapper -->
	
</body>
</html>