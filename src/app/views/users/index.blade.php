@extends('layouts.master')

@section('content')

<article class="artists">

<h1>Clark's Artists</h1> 

<ul>
@foreach($users as $user)

<li>{{link_to_action('UserController@show', $user->first_name . ' ' . $user->last_name, $user->id)}}</li>

@endforeach
</ul>

</article> 

@stop