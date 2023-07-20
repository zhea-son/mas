@extends('pages.layouts.master')
@section('title', "My Doctors")

@section('content')

<div class="container">
    
    <a type="button" class="btn btn-primary" href="{{ route('admin.doctor.create') }}">+ Add Doctor</a>
    

    {{-- <div class="row" style="margin-top:5px;">
      @foreach ($docs as $item)
        
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="/assets/images/doctor1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">{{ $item->name }} </h5><span style="float:right;background-color:rgb(72, 255, 0);">{{ $item->status }}</span>
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
      
  </div> --}}

  <div class="card mt-2">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Degree</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docs as $item)
                    
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->specialization->specialization }}</a></td>
                    <td>{{ $item->degree }}</td>
                    <td>{{ $item->contact }}</td>
                    <td>{{ $item->email }}</td>
                    <td><span class="badge badge-success">{{ $item->status }}</span></td>
                    <td class="text-center">
                        <a type="button" class="btn btn-info d-inline-block" href="{{ route('admin.doctor.edit', $item->id) }}">Edit</a>
                        <form action="{{route('admin.doctor.destroy', $item->id)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button style="margin-left:5px;" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                
            </tbody>
        </table>
    </div>
</div>

    {{-- {{ $docs->links() }} --}}

</div>

@endsection
