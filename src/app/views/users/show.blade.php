@extends('layouts.master')

@section('content')

<h1>{{$user->first_name}} {{$user->last_name}}</h1> 

<h1>Posts</h1> 

@foreach($posts as $post)
	<h2>{{$post->title}}</h2>
	<p>{{$post->text}}</p> 
@endforeach

@stop