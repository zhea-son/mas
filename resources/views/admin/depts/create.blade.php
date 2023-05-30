@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Add Department</h2><br/>
<form action="{{ route('dept.store') }}" method="POST"> 
    @csrf
    <div class="form-group">
      <label for="">Department Name</label>
      <input type="text" class="form-control" id="dept" name="dept" aria-describedby="emailHelp" placeholder="Enter Department">
    </div>
    <div class="form-group">
      <label for="">Rooms</label>
      <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Room Numbers">
    </div>
    <br/>
    <center><button type="submit" class="btn btn-primary">Add</button></center>
</form>
</div>


@endsection
