<!DOCTYPE >
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/css/mypage.css" />
		@yield('outCss')
		<title>MANAGE STUDENT</title>
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar-default" role="navigation">
				<div class="row">
					<div class="col-md-10 col-xs-6 text-center">
						<h4 style="padding:7px; color: #FFFFFF;">SYSTEM MANAGE STUDENT IN UNIVERSITY </h4>
					</div>
					<div class="col-md-2 col-xs-6">
						<a href="{{route('auth.logout')}}" class="btn btn-green">Logout</a>
					</div>
				</div>
			</nav>
			<ul id="menu" class="nav text-left">
				<li >
					<a href="{{route('student.index')}}">MANAGE STUDENT </a>
				</li>
				<li >
					<a href="{{route('classes.index')}}">MANAGE CLASSES </a>
				</li>
				<li >
					<a href="{{route('subject.index')}}">MANAGE SUBJECT </a>
				</li>
				<li >
					<a href="{{route('point.index')}}">MANAGE POINT </a>
				</li>
			</ul>
			@yield('body')
		</div>
		<script src="/js/jquery-2.1.1.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		@yield('outJs')
	</body>
</html>