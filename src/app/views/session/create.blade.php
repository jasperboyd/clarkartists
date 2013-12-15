@if (Session::has('login_errors'))
  <span class="error">Username or password incorrect.</span>
@endif

<h1>Login</h1>
@include('session.partials.login')
