@extends('layouts.master')

@section('content')

@include('bulletin.create')

<h1>Bulletin Board</h1> 

@foreach($bulletins as $bulletin)

	<h2>{{$bulletin->title}}</h2>

	<h3>by {{link_to_route('users.show', User::find($bulletin->user_id)->first_name, $bulletin->user_id)}}</h3>
	<h4>pinned at {{$bulletin->updated_at}}</h4>
	<p>{{$bulletin->text}}</p> 
	
	@if($bulletin->user_id == Auth::user()->id)
		<p>{{link_to_route('bulletins.edit', 'edit', $bulletin->id)}}</p>
		@include('bulletin.destroy')	
	@endif


@endforeach

@stop