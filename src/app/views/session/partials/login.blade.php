{{Form::open(['route' => 'session.store']) }} 

	{{ Form::label('email', 'Email:') }} 
	{{ Form::text('email') }}

	{{ Form::label('Password', 'Password:') }} 
	{{ Form::password('password') }}  

	{{ Form::submit('Login') }}

{{Form::close()}}
