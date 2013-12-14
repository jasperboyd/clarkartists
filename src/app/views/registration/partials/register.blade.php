{{ Form::open(['route' => 'registration.store']) }} 

	<p>{{ Form::label('email', 'Email:') }} 
	{{ Form::text('email') }}</p> 
	<p>{{ Form::label('first_name', 'First Name:') }} 
	{{ Form::text('first_name') }} </p>
	<p>{{ Form::label('last_name', 'Last Name: ') }} 
	{{ Form::text('last_name') }} </p>
	<p>{{ Form::label('password', 'Password:') }}
	{{ Form::password('password') }} </p>
	<p>{{ Form::label('password_confirmation', 'Password Confirmation:') }} 
	{{ Form::password('password_confirmation') }}</p>
	<p>{{ Form::submit('register') }}</p>  

{{ Form::close() }} 
