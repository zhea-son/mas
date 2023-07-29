@extends('pages.layouts.master')
@section('title', "My Departments")
@section('content')

<div class="container">
    <a type="button" class="btn btn-primary" href="{{ route('admin.department.create') }}">+ Add Department</a>
    <input type="text" class="form-control" style="width:300px;float:right;" placeholder="Search" id="inputSearch">
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">Room No.</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="myTable">
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
                <a type="button" class="btn btn-info" href="{{ route('admin.department.edit', $dept->id) }}">Edit</a>
                <form action="{{route('admin.department.destroy', $dept->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin-left:5px;" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

    {{-- {{ $depts->links() }} --}}

</div>

@endsection

@section('custom-script')

<script>

$("#inputSearch").keyup(function(){
  var search = $(this).val().toLowerCase();
  $("#myTable tr").filter(function(){
    $(this).toggle($(this).text().toLowerCase().indexOf(
      search
    )>-1);
  });
});

</script>

@endsection
