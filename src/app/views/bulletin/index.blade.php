@extends('layouts.master')

@section('content')

<article class="bulletin_board">

@include('bulletin.create')

<h1>Bulletin Board</h1> 

@foreach($bulletins as $bulletin)

	<section class="bulletin"> 

	<h2>{{$bulletin->title}}</h2>

	<h3>by {{link_to_route('users.show', User::find($bulletin->user_id)->first_name, $bulletin->user_id)}}</h3>
	<h4>pinned at {{$bulletin->updated_at}}</h4>
	<p>{{$bulletin->text}}</p> 
	
	@if($bulletin->user_id == Auth::user()->id)
		<p>{{link_to_route('bulletins.edit', 'edit', $bulletin->id)}}</p>
		@include('bulletin.destroy')	
	@endif

	@foreach( $bulletin->comments as $comment)
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

				{{ Form::open(['route' => ['comments.store.bulletincomment', $bulletin->id]])}}
					@include('comments.create')
				{{ Form::close() }}

	</section>

@endforeach

</article>

@stop