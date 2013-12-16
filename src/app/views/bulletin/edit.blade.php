@extends('layouts.master')

@section('content')

<article class="bulletin_editor"> 

<h1>Edit your bulletin</h1>

{{Form::model($bulletin, ['route' => ['bulletins.update', $bulletin->id], 'method'=>'PUT'])}}

@include('bulletin.partials.form')

{{Form::close()}}

</article> 

@stop