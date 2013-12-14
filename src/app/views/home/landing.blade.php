@extends('layouts.master')

@section('content')

	<h1>Welcome Clark Artists</h1>

	<section class="registration"> 
	@include('registration.create')
	</section> 

	<section class="login">  
	@include('session.create')
	</section> 

@stop
