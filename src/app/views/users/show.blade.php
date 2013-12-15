@extends('layouts.master')

@section('content')

<h1>{{ $user->full_name }}</h1> 

<h3>Major: {{$user->major}}</h3>

<h2>Posts</h2> 

@foreach($posts as $post)
	@if($post->post_attachment != NULL)
		<a href="{{$post->post_attachment}}"><h3>{{$post->title}}</h3></a>
	@else
		<h3>{{$post->title}}</h3>
	@endif
	
	<p>{{$post->text}}</p>
@endforeach

<h2>Bulletins</h2> 

@foreach($bulletins as $bulletin)
	<h3>{{$bulletin->title}}</h3>
	<h4>pinned at {{$bulletin->updated_at}}</h4>
	<p>{{$bulletin->text}}</p> 
@endforeach

@stop