{{Form::open(['route' => 'session.create'])}} 

	{{ Form::label('email', 'Email:') }} 
	{{ Form::text('email') }}

	{{ Form::label('Password', 'Password:') }} 
	{{ Form::password('password') }}  

{{Form::close()}}
