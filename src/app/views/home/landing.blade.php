@extends('layouts.master')

@section('content')

	<h1>Welcome Clark Artists</h1>

	<section> 
	<h2>Login</h2> 
	@include('registration.partials.regform')
	</section> 

	<section> 
	<h2>Register</h2> 
	@include('registration.partials.loginform')
	</section> 

@stop