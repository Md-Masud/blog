<!DOCTYPE html>
<html lang="en">
<head>
  <title>blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
  <ul class="navbar-nav ">
    <li class="nav-item">
      <a class="nav-link" href="{{route('register')}}">Registation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{'login'}}">Login</a>
    </li>
    
  </ul>
</nav>
<br>

<div class="container">
   @yield('content')
</div>

</body>
</html>
