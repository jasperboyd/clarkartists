@extends('layouts.master')

@section('content')


<h1>Edit your Comment to {{ $post->title }}</h1>

<h6>Because we all put our foot in our mouths sometimes!</h6>

<p>{{ $post->text }}<p>


{{Form::model($comment,['route'=>['comments.update', $post->id, $comment->id],'method'=>'PUT'])}}

@include('comments.partials.form')

{{Form::close()}}

@stop