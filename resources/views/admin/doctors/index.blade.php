@extends('layouts.main')

@section('content')

<div class="container">
    <br/>
    <a type="button" class="btn btn-primary" href="{{ route('dept.create') }}">+ Add Department</a>
    <br/>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Degree</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            @if(count($depts) == 0)
                <td colspan="4">No Departments Added.</td>
            @endif
            </tr>
            @foreach($depts as $dept)
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $dept->department }}</td>
            <td>{{ $dept->room_no }}</td>
            <td style="display:flex;">
                <a type="button" class="btn btn-info" href="{{ route('dept.edit', $dept->id) }}">Edit</a>
                <form action="{{route('dept.destroy', $dept->id)}}" method="POST">
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

@endsection
