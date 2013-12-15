@if($errors->any())
  <ul>
    {{ implode('', $errors->all('<li>:message</li>'))}}
  </ul>
@endif

<h1>Register</h1> 

<p>Please enter all of the following:</p> 

@include('registration.partials.register')
