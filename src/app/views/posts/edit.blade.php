@extends ('layouts.master')

@section('content') 

	<article class="post_editor">
	
	<h1>Edit a Post</h1>

	{{ Form::model($post, array('route' => array('posts.update'), 'method' => 'PATCH')) }}

	@include('posts.partials.form')

  	{{ Form::close() }}

  </article>

@stop