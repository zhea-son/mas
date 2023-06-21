@extends('admin.layouts.master')
@section('title', "Edit Doctor")

@section('content')

<div class="container">
    <h2>Edit Doctor</h2><br/>
<form action="{{ route('admin.doctor.update', $doc->id) }}" method="POST"> 
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="">Doctor Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{ $doc->name }}">
    </div>
    <div class="form-group">
      <label for="">Contact</label>
      <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp" placeholder="Enter Contact" value="{{ $doc->contact }}">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ $doc->email }}">
    </div>
    <div class="form-group">
      <label for="">Address</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Enter Address" value="{{ $doc->address }}">
    </div>
    <div class="form-group">
      <label for="">Degree</label>
      <input type="text" class="form-control" id="degree" name="degree" aria-describedby="emailHelp" placeholder="Enter Degree" value="{{ $doc->degree }}">
    </div>
    <div class="form-group">
      <label for="">Specialization</label>
      <select name="specialization_id" class="form-control">
        <option value="">--Select</option>
        @foreach ($specs as $item)
        <option value="{{ $item->id }}" {{ $doc->specialization_id == $item->id ? 'selected' : '' }}>{{ $item->specialization }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">License</label>
      <input type="text" class="form-control" id="license" name="license" aria-describedby="emailHelp" placeholder="Enter License" value="{{ $doc->license }}">
    </div>
    
    <br/>
    <center><button type="submit" class="btn btn-primary">Edit</button></center>
</form>
</div>


@endsection
