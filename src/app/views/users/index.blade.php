@extends('layouts.master')

@section('content')

<h1>Clark's Artists</h1> 

@foreach($users as $user)

<li>{{link_to_action('UserController@show', $user->first_name . ' ' . $user->last_name, $user->id)}}</li>

@endforeach

@stop