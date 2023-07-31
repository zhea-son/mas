@extends('pages.layouts.master')
@if(Route::currentRouteName() == 'admin.schedule.index')
@section('title',"My Schedules")
@else
@section('title',"Completed Checkups")
@endif
@section('content')

<div class="container">
  @if(Route::currentRouteName() == 'admin.schedule.index')<a type="button" class="btn btn-primary" href="{{ route('admin.schedule.create') }}">+ Add Schedule</a>@endif
  <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <input type="text" class="form-control my-2" style="width:300px;float:right;" placeholder="Search" id="inputSearch">

        </div>

        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            
            <a href="#" class="breadcrumb-elements-item" onclick="getData('today')">
                <i class="icon-comment-discussion mr-2"></i>
                Today
            </a>

            <a href="#" class="breadcrumb-elements-item" onclick="getData('month')">
                <i class="icon-comment-discussion mr-2"></i>
                Month
            </a>

            <a href="#" class="breadcrumb-elements-item" onclick="getData('year')">
                <i class="icon-comment-discussion mr-2"></i>
                Year
            </a>

        </div>
    </div>
</div>
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
        @if(Route::currentRouteName() == 'admin.schedule.index')<td colspan="7">No Schedules Added.</td>@else<td colspan="7">No Checkups Completed yet.</td>@endif
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
            @if(Route::currentRouteName() == "admin.schedule.index")<a type="button" class="btn btn-info" href="{{ route('admin.schedule.appointments', $schedule->id) }}">View Appointments</a>@else
            <a type="button" class="btn btn-info" href="{{ route('admin.checkups.appointments', $schedule->id) }}">View Appointments</a>@endif
            @if(Route::currentRouteName() == "admin.schedule.index")
            @if(Carbon\Carbon::parse($schedule->date.$schedule->to) > Carbon\Carbon::now() && Carbon\Carbon::parse($schedule->date.$schedule->from) > Carbon\Carbon::now())
            <form action="{{route('admin.schedule.destroy', $schedule->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="margin-left:5px;" type="submit" class="btn btn-danger">Delete</button>
            </form>
            @elseif(Carbon\Carbon::parse($schedule->date.$schedule->to) > Carbon\Carbon::now() && Carbon\Carbon::parse($schedule->date.$schedule->from) < Carbon\Carbon::now())
            <button style="margin-left:5px;" type="button" class="btn btn-secondary" disabled>Running</button>
            @else 
            <form action="{{route('admin.schedule.complete', $schedule->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button style="margin-left:5px" type="submit" class="btn btn-warning">Complete</button>
            </form>
            @endif
            @endif
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