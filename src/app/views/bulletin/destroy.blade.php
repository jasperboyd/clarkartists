{{Form::open(['route' => ['bulletins.destroy', $bulletin->id], 'method' => 'DELETE'])}}
	{{Form::submit('Delete')}}
{{Form::close()}}