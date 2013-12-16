@extends('layouts.master')

@section('content')
	
	<article class="feed">
	<h1>Welcome {{Auth::user()->first_name}}</h1>
	<p>Here you can view what othe Clark Artists have been up to.</p> 
	
		@foreach($posts as $post)
			<section class="post">
			
			@if($post->post_attachment != NULL)
				<h2><a href="{{$post->post_attachment}}">{{$post->title}}</a></h2>
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
					<section class="comment">
					<p>
					<span class="highlight">{{ $comment->user->full_name }}:</span> 
					{{$comment->comment}} 
					
					@if($comment->user->id == Auth::user()->id)
						<!--Comment menu-->
					@endif
					</p> 
					</section>
				@endforeach

				{{ Form::open(['route' => ['comments.store', $post->id]])}}
					@include('comments.create')
				{{ Form::close() }}
			</p>
			</section>
		@endforeach
	
	</article>
@stop