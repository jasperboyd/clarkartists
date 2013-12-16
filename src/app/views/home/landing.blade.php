@extends('layouts.master')

@section('content')

	<article class="landing"> 
	<h1>Welcome Clark Artists</h1>

	<section class="registration"> 
	@include('registration.create')
	</section> 

	<section class="login">  
	@include('session.create')
	</section> 
	<article> 

@stop
