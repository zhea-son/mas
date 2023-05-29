@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Edit Department</h2><br/>
<form action="{{ route('dept.update', $dept->id) }}" method="POST">
    @csrf 
    @method('PUT')
    <div class="form-group">
      <label for="">Department Name</label>
      <input type="text" class="form-control" id="dept" name="dept" aria-describedby="emailHelp" placeholder="Enter Department" value="{{ $dept->department }}">
    </div>
    <div class="form-group">
      <label for="">Rooms</label>
      <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Room Numbers" value="{{ $dept->room_no }}">
    </div>
    <br/><center><button type="submit" class="btn btn-primary">Edit</button></center>
</form>
</div>


@endsection
