{{Form::open(array('route' => array('bulletins.destroy', $bulletin->id), 'method' => 'DELETE'))}}
	{{Form::submit('Delete')}}
{{Form::close()}}