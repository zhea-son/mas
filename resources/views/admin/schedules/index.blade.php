@extends('pages.layouts.master')
@section('title',"My Schedules")
@section('content')

<div class="container">
    <a type="button" class="btn btn-primary" href="{{ route('admin.schedule.create') }}">+ Add Schedule</a>
    <input class="form-control" id="inputSearch" style="width:300px;float:right;" type="text" placeholder="Search">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Department</th>
        <th scope="col">Time Frame</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <tr>
        @if(count($schedules) == 0)
            <td colspan="7">No Schedules Added.</td>
        @endif
        </tr>
        @foreach($schedules as $schedule)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{ $schedule->date }}</td>
        <td>{{ $schedule->doctor->name }}</td>
        <td>{{ $schedule->department->department }}</td>
        <td>{{ $schedule->time_frame }} minutes</td>
        <td>{{ $schedule->from }}</td>
        <td>{{ $schedule->to }}</td>
        <td style="display:flex;">
            <a type="button" class="btn btn-info" href="{{ route('admin.schedule.appointments', $schedule->id) }}">View Appointments</a>
            <form action="{{route('admin.schedule.destroy', $schedule->id)}}" method="POST">
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


{{-- {{ $schedules->links() }} --}}

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