  <p>{{ Form::label('title', 'Title') }}
       {{ Form::text('title') }}</p>

  <p>{{ Form::label('text', 'Description') }}
       {{ Form::text('text') }}</p>

  <p>Format for a link must be: <span class="highlight">http://www.google.com</span></p> 

  <p>{{ Form::label('post_attachment', 'Link') }}
       {{ Form::text('post_attachment') }}</p>  

  <p>{{ Form::submit('Post') }}</p>
