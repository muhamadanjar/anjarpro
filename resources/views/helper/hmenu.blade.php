	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle right icons</span>
				<i class="icon-grid"></i>
			</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				<span class="sr-only">Toggle menu</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
			<!--<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>-->
		</div>
		

		<!--<ul class="nav navbar-nav collapse" id="navbar-menu">
			<li><a href="#"><i class="icon-screen2"></i> <span>Dashboard</span></a></li>
		</ul>-->
		@if(\Auth::check())
			{!! (Session::get('menusess')) !!}
	
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="http://placehold.it/300" alt="">
					<span>{{ \Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<!--<li><a href="#"><i class="icon-user"></i> Profile</a></li>
					<li><a href="#"><i class="icon-bubble4"></i> Messages</a></li>-->
					<li><a href="{{ action('ModulCtrl@ModulList') }}"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="{{ action('CAuthController@getLogout') }}"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
		
		@endif
	</div>
	<!-- /navbar -->