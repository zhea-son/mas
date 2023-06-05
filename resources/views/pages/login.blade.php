@extends('layouts.main')

@section('content')

<div class="container">
    <h1 class="text-center bg-primary rounded">Login Form</h1>
<form class="text-center" action="{{ route('login') }}" method="POST">
    @csrf
    <!-- Email input -->
    <div class="row">
    <div class="col-md-4"></div>
    <div class="form-outline mb-4 col-md-4">
        <input type="email" id="form2Example1" name="email" class="form-control col-sm-4" placeholder="Enter Email"/>
    </div>
    <div class="col-md-4"></div>
    </div>
  
    <!-- Password input -->
    <div class="row">
    <div class="col-md-4"></div>
    <div class="form-outline mb-4 col-md-4">
        <input type="password" id="form2Example2" name="password" class="form-control col-sm-4" placeholder="Enter Password"/>
    </div>
    <div class="col-md-4"></div>
    </div>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
  
    <!-- Register buttons -->
    <div class="text-center">
      <p>Not a member? <a href="#!">Register</a></p>
      
    </div>
</form>  
</div>  

@endsection