@extends('partials.master')
@section('container')
 <div class="container">
  <h2>Registation</h2>
  <div class="card">
<form action="{{route('register')}}"method="post" enctype="multipart/form-data">
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
      <div class=" alert alert-{{sessin('type')}}">
        {{session('message')}}
      </div>
      @endif 
    <div class="form-group">
    <label for="full_name">User Name</label>
    <input type="text" class="form-control" name="full_name" placeholder="name" value="{{ old('full_name') }}">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{old('email')}}">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name ="password"id="pwd" value="{{old('password')}}">
  </div>
  <div class="form-group">
    <label for="pwd">Phone:</label>
    <input type="number" class="form-control" placeholder="Enter PhoneNumber" name ="phone"id="pwd" value="{{old('phone')}}">
  </div>
  <div class="form-group">
    <label for="pwd">Address:</label>
    <input type="text" class="form-control" placeholder="Enter Address" name ="address"id="pwd" value="{{old('address')}}">
  </div>
    <div class="col-sm-4">
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
@endsection