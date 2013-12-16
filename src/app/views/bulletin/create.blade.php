<section class="bulletin_creator"> 

<h1>Create A New Bulletin</h1>

<p>Bulletins are for finding collaborators for your latest projects!</p>

{{Form::open(array('route' => 'bulletins.store'))}}
@include('bulletin.partials.form')
{{Form::close()}}

</section>