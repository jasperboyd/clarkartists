@extends ('layouts.master')

@section('content') 
	
	<h1>Create a Post</h1>

	{{ Form::open(['route' => 'posts.store']) }}

	@include('posts.partials.form')

  	{{ Form::close() }}

@stop