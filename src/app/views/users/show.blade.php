@extends('layouts.master')

@section('content')

<article class="profile"> 

<h1>{{ $user->full_name }}</h1> 

<h3>Major: {{$user->major}}</h3>

<section class="posts">
<h2>Posts</h2> 

@foreach($posts as $post)
	<section class="post"> 
	@if($post->post_attachment != NULL)
		<h3><a href="{{$post->post_attachment}}">{{$post->title}}</a></h3>
	@else
		<h3>{{$post->title}}</h3>
	@endif
	
	<p>{{$post->text}}</p>

	@foreach( $post->comments as $comment)
					<section class="comment">
					<p>
					<span class="highlight">{{ $comment->user->full_name }}:</span> 
					{{$comment->comment}} 
					
					@if($comment->user->id == Auth::user()->id)
						{{ link_to_route('comments.edit', 'edit', [$post->id, $comment->id]) }} | {{ link_to_route('comments.destroy', 'delete', $comment->id) }}
					@endif
					</p> 
					</section>
	@endforeach

				{{ Form::open(array('route' => array('comments.store', $post->id)))}}
					@include('comments.create')
				{{ Form::close() }}

	</section>
@endforeach
</section>

<section class="bulletins"> 
<h2>Bulletins</h2> 

@foreach($bulletins as $bulletin)
	<section class="bulletin"> 
	<h3>{{$bulletin->title}}</h3>
	<h4>pinned at {{$bulletin->updated_at}}</h4>
	<p>{{$bulletin->text}}</p> 
	</section> 
@endforeach
</section>

</article> 

@stop