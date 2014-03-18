<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::route('home') }}">AaoKhaoKhisko</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">

			@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i>&nbsp; {{ Auth::user()->fullname}} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::route('account-settings') }}">Settings</a></li>
						<li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>						
					</ul>
				</li>
				<!-- <li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li> -->
			@else
				<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
				<li><a href="{{ URL::route('account-create') }}">Sign Up</a></li>

			@endif
				
			</ul>
		</div>
	</div>
</div>