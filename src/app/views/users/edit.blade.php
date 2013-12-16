@extends('layouts.master')

@section('content')

	<article class="account_editor"> 

	<h1>Edit Your Account</h1> 

	{{Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'PUT'))}}
		<p>{{ Form::label('email', 'Email:') }} 
		{{ Form::text('email') }}</p> 
		<p>{{ Form::label('first_name', 'First Name:') }} 
		{{ Form::text('first_name') }} </p>
		<p>{{ Form::label('last_name', 'Last Name: ') }} 
		{{ Form::text('last_name') }} </p>
		<p>{{ Form::label('major', 'Major: ') }} 
		{{ Form::text('major') }} </p>
		<p>
			{{ Form::submit('Update') }}
		</p>

	{{Form::close()}}

	</article> 

@stop