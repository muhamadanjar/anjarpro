<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>AnjarPro - Anjar Applicationv</title>
@include('helper/css')

@include('helper/script')



</head>

<body class="navbar-fixed">

	<!-- Navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">WebApp<!--<img src="images/logo.png" alt="Londinium">--></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			@if(\Auth::check())
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="http://placehold.it/300" alt="">
					<span>{{ \Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="{{ action('ModulCtrl@ModulList') }}"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="{{ action('CAuthController@getLogout') }}"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
			@endif
		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		@include('helper/sidebar')


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>AnjarPro <small>Page example with fixed navbar</small></h3>
				</div>

				<div id="reportrange" class="range">
					<div class="visible-xs header-element-toggle">
						<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
					</div>
					<div class="date-range"></div>
					<span class="label label-danger">9</span>
				</div>
			</div>
			<!-- /page header -->


			@yield('breadcrumbs')
			@if (count($errors) > 0)
				<div class="callout callout-danger fade in">
					<button data-dismiss="alert" class="close" type="button">×</button>
					<h5><strong>Whoops!</strong> Ada beberapa masalah dengan apa yang Anda input.</h5>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif


			

            @if(Session::has('message'))
		        {!! Session::get('message') !!}
			@endif

			@yield('content')

	        @include('helper/delete_confirm')

	        


            <hr>


			




	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; 2013. Londinium Admin Template by <a href="http://themeforest.net/user/Kopyov">Eugene Kopyov</a></div>
	        	<div class="pull-right icons-group">
	        		<a href="#"><i class="icon-screen2"></i></a>
	        		<a href="#"><i class="icon-balance"></i></a>
	        		<a href="#"><i class="icon-cog3"></i></a>
	        	</div>
	        </div>
	        <!-- /footer -->


		</div>
		<!-- /page content -->

	</div>
	<!-- /content -->

</body>
<script type="text/javascript" src="{{ asset('londinium/js/application.js') }}"></script>
<script type="text/javascript" src="{{ asset('anjarpro.js') }}"></script>
</html>