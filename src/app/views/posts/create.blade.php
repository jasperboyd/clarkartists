@extends ('layouts.master')

@section('content') 

	<article class="post_creator">
	
	<h1>Create a Post</h1>

	<p>Share what you've been up to with the community!</p>

	{{ Form::open(array('route' => 'posts.store')) }}

	@include('posts.partials.form')

  	{{ Form::close() }}

  	</article> 

@stop