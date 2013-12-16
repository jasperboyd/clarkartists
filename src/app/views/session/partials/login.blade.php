{{Form::open(['route' => 'session.store']) }} 

	<p>{{ Form::label('email', 'Email:') }} 
	{{ Form::text('email') }}

	{{ Form::label('Password', 'Password:') }} 
	{{ Form::password('password') }}  

	{{ Form::submit('Login') }}</p>

{{Form::close()}}
