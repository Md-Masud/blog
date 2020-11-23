
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
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-right order-3 ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      @auth()
      <li class="nav-item">
        <a class="nav-link" href="{{route('index')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">logout</a>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">sign in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">sign up</a>
      </li>
      @endguest
         
    </ul>
  </div>  
</nav>