@extends('partials.master')
   @section('container')
  <!-- Main Content -->
  <div class="container">
    <form action="{{route('login')}}" method="post">
     @csrf
  @if($errors->all())
   <div class="alert alert-danger">
  @if($errors->count()==1)
  {{$errors->first()}}

  @else
   
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
  @endif
  @if(Session::has('message'))
      <div class=" alert alert-{{Session::get('type')}}">
        {{Session::get('message')}}
      </div>
      @endif
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email"id="email" value="{{old('email')}}">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name ="password"id="pwd" name="password"value="{{old('password')}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
 @endsection
  <!-- Footer -->
 