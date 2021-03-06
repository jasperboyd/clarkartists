<html>
<head>
	<title>Clark Artists</title>
	{{HTML::style('styles/css/screen.css');}}
</head>
<body>
	@if(Auth::check())
	<header> 
		<h1>Clark Artists</h1> 
		<h2>A Creative Cloud Space</h2>
	</header> 
	<nav> 
		{{link_to_route('home.index', 'Feed')}}
		{{link_to_route('users.index', 'Artists')}}
		{{link_to_route('posts.create', 'Create Post')}}
		{{link_to_route('bulletins.index', 'Bulletin Board')}}
		{{link_to_route('users.edit', 'Settings', Auth::user()->id)}}
		{{link_to_action('SessionController@destroy', 'Logout')}}
	</nav> 
	@endif

	@yield('content')

	<footer> 
		<h6>Clark Artists 2013 | <a href="jboyd.co">Jasper Boyd</a>, Fenn Macon, and Charlie Hildreth</h6> 
	</footer> 
</body>
</html>