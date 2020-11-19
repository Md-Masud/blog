@extends('partials')
@section('content')

<form action="/action_page.php">
	<div class="form-group">
  	<label for="name">User Name</label>
  	<input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection