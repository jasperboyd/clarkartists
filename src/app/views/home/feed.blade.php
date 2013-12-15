@extends('layouts.master')

@section('content')

	<h1>Welcome {{Auth::user()->first_name}}</h1>
	<p>Here you can view what othe Clark Artists have been up to.</p> 
		@foreach($posts as $post)
			
			@if($post->post_attachment != NULL)
				<a href="{{$post->post_attachment}}"><h2>{{$post->title}}</h2></a>
			@else
				<h2>{{$post->title}}</h2>
			@endif

			
			
			<h3>by {{ link_to_route('users.show', User::find($post->user_id)->full_name, $post->user_id )}}</h3> 
			
			<p>{{$post->text}}</p>
			
			<p> 
				@if($post->user_id == Auth::user()->id)
				{{link_to_action('PostsController@edit', 'edit', $post->id)}}
				@endif

				@foreach( $post->comments as $comment)
					<p>
					{{ $comment->user->first_name }} 
					{{ $comment->user->last_name }}: 
					{{$comment->comment}} 
					
					@if($comment->user->id == Auth::user()->id)
						{{ link_to_route('comments.edit', 'edit', [$post->id, $comment->id]) }} | {{ link_to_route('comments.destroy', 'delete', $comment->id) }}
					@endif
					</p> 
				@endforeach

				{{ Form::open(['route' => ['comments.store', $post->id]])}}
					@include('comments.create')
				{{ Form::close() }}
			</p>
		@endforeach

@stop