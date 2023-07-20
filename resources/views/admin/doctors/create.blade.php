@extends('pages.layouts.master')
@section('title', "Create Doctor")

@section('content')

<div class="container">
  <a href="/admin/doctors"><u>Back</u></a>

<form action="{{ route('admin.doctor.store') }}" method="POST"> 
    @csrf
    <div class="form-group">
      <label for="">Doctor Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="">Contact</label>
      <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp" placeholder="Enter Contact">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="">Address</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Enter Address">
    </div>
    <div class="form-group">
      <label for="">Degree</label>
      <input type="text" class="form-control" id="degree" name="degree" aria-describedby="emailHelp" placeholder="Enter Degree">
    </div>
    <div class="form-group">
      <label for="">Specialization</label>
      <select name="specialization_id" class="form-control">
        <option value="">--Select</option>
        @foreach ($specs as $item)
        <option value="{{ $item->id }}">{{ $item->specialization }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">License</label>
      <input type="text" class="form-control" id="license" name="license" aria-describedby="emailHelp" placeholder="Enter License">
    </div>
    
    <br/>
    <center><button type="submit" class="btn btn-primary">Add</button></center>
</form>
</div>


@endsection
