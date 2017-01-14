<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Simple login form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
  <div class="container">
  <div class="login">
  	<h1 class="login-heading">
      <strong>Welcome.</strong> Please login.</h1>
      <form method="post" action="{{ route('sso.store') }}">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="redirect_url" value="{{ $redirect_url }}" />
        <input type="text" name="username" placeholder="Username" required="required" class="input-txt" />
          <input type="password" name="password" placeholder="Password" required="required" class="input-txt" />
          <div class="login-footer">
             <a href="#" class="lnk">
              <span class="icon icon--min"><!-- ಠ╭╮ಠ --></span> 
              I've forgotten something
            </a>
            <button type="submit" class="btn btn--right">Sign in  </button>
    
          </div>
      </form>
  </div>
</div>
</body>
</html>
