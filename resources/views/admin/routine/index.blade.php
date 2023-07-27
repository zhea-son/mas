@extends('pages.layouts.master')

@section('content')

<div class="container">
    <a type="button" class="btn btn-primary" href="{{ route('admin.routine.create') }}">+ Add Routine</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Department</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Days</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        @if(count($schedules) == 0)
            <td colspan="7">No Schedules Added.</td>
        @endif
        </tr>
        @foreach($schedules as $schedule)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{ $schedule->doctor->name }}</td>
        <td>{{ $schedule->department->department }}</td>
        <td>{{ $schedule->from }}</td>
        <td>{{ $schedule->to }}</td>
        @php $day_ids = explode(',',$schedule->recurring); @endphp
        <td>Every 
          @foreach ($days as $item)
            @if(in_array($item->id,$day_ids))
            {{ $item->day }},
            @endif    
          @endforeach</td>
        <td style="display:flex;">
            <a type="button" class="btn btn-info" href="{{ route('admin.appointment.index', $schedule->id) }}">View Appointments</a>
            <form action="{{route('admin.routine.destroy', $schedule->id)}}" method="POST">
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