@extends('layouts.master')

@section('content')

	<h1>Welcome {{Auth::user()->first_name}}</h1>
	<p>Here you can view what othe Clark Artists have been up to.</p> 
	@foreach($users as $user)
		@foreach($user->posts as $post)
			<h2>{{$post->title}}</h2>
			<h3>by {{ $user->first_name }} {{ $user->last_name }}</h3> 
			<p>{{$post->text}}</p>
			<p> 
				@if($post->user_id == Auth::user()->id)
				{{link_to_action('PostsController@edit', 'edit', $post->id)}}
				@endif

				@foreach( $post->comments as $comment)
					<p>{{ $comment->user->first_name }} {{ $comment->user->last_name }} : {{$comment->comment}}</p> 
				@endforeach

				{{ Form::open(['route' => ['comments.store', $post->id]])}}
					@include('comments.create')
				{{ Form::close() }}
			</p>
		@endforeach
	@endforeach

@stop