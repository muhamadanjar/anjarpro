<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>AnjarPro - Anjar Applicationv</title>

@include('helper/css')
@include('helper/script')
<script type="text/javascript" src="{{ asset('londinium/js/application.js') }}"></script>
<script type="text/javascript" src="{{ asset('anjarpro.js') }}"></script>
</head>

<body>

	@include('helper/hmenu')
	<!-- Page container -->
 	<div class="page-container">
		@include('helper/sidebar')
		<!-- Page content -->
	 	<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>AnjarPro <small>Aplikasi Evo</small></h3>
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

	        @include('helper/delete_confirm')


	        @yield('content')


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
	<!-- /page container -->

</body>
</html>