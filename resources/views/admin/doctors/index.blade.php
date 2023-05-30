@extends('layouts.main')

@section('content')

<div class="container">
    <br/>
    <a type="button" class="btn btn-primary" href="{{ route('doc.create') }}">+ Add Doctor</a>
    <br/>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Degree</th>
            <th scope="col">Specialization At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            @if(count($docs) == 0)
                <td colspan="7">No Doctors Added.</td>
            @endif
            </tr>
            @foreach($docs as $doc)
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $doc->name }}</td>
            <td>{{ $doc->contact }}</td>
            <td>{{ $doc->address }}</td>
            <td>{{ $doc->degree }}</td>
            <td>{{ $doc->specialization }}</td>
            <td style="display:flex;">
                <a type="button" class="btn btn-info" href="{{ route('doc.edit', $doc->id) }}">Edit</a>
                <form action="{{route('doc.destroy', $doc->id)}}" method="POST">
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
