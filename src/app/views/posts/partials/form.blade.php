  <p>{{ Form::label('title', 'Post Title') }}
       {{ Form::text('title') }}</p>

  <p>{{ Form::label('text', 'Show off your latest') }}
       {{ Form::text('text') }}</p>

  <p>{{ Form::label('post_attachment', 'Want to include a link?') }}
       {{ Form::text('post_attachment') }}</p>  

  <p>{{ Form::submit('Post') }}</p>
