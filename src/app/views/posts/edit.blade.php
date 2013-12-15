@extends ('layouts.master')

@section('content') 
	
	<h1>Edit a Post</h1>

	{{ Form::model($post, ['route' => ['posts.update'], 'method' => 'PATCH']) }}

	@include('posts.partials.form')

  	{{ Form::close() }}

@stop