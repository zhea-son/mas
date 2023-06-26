@extends('admin.layouts.master')
@section('title', "My Doctors")

@section('content')

<div class="container">
    <br/>
    <a type="button" class="btn btn-primary" href="{{ route('admin.doctor.create') }}">+ Add Doctor</a>
    <br/>

    <div class="row" style="margin-top:5px;">
      @foreach ($docs as $item)
        
      <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/assets/images/doctor1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">Really Good Doctor!!</p>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $item->specialization->specialization }}</li>
              <li class="list-group-item">{{ $item->degree }}</li>
          </ul>
          <div class="card-body" style="display:flex;">
              <a href="{{ route('admin.doctor.edit', $item->id) }}" class="card-link">Edit</a>
              <a href="#" class="card-link" style="color:teal;">Add Schedule</a>
              <form action="{{route('admin.doctor.destroy', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="card-link" style="color:red;margin-left:15px;">Delete</button>
              </form>
          </div>
          </div>
      </div>
      @endforeach
      
  </div>

    {{-- {{ $docs->links() }} --}}

</div>

@endsection
