<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<!--mobile friendly-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title') | Blog</title>
		{!! Html::style('css/app.css') !!}
		{!! Html::style('css/custom.css') !!}
        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/js.js') !!}

	</head>
	<body>
		
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">SphBlog</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="/">Home</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li>
						<a href="{{ url('/login') }}">Login</a>
					</li>
					<li>
						<a href="{{ url('/register') }}">New User</a>
					</li>
				@else						
					<li>
						<a href="{{ url('/new') }}">Create New Post</a>
					</li>
					<li>
						<a href="{{ url('/logout') }}">Logout</a>
					</li>							
				@endif
			</ul>
		  </div>
		</nav>		
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
