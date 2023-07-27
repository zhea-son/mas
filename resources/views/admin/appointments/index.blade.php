@extends('pages.layouts.master')
@section('title',"Appointments")
@section('content')

<div class="container">
    <span class="badge badge-secondary my-3 my-lg-0 ml-lg-3">{{ $doc }}</span>
    <span class="badge badge-primary my-3 my-lg-0 ml-lg-3">{{ $dept }}</span>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        @if(count($apps) == 0)
            <td colspan="7">No Appointments Added.</td>
        @endif
        </tr>
        @foreach($apps as $item)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{ $item->schedule->date }}</td>
        <td>{{ $item->from }}</td>
        <td>{{ $item->to }}</td>
        <td>
            <span class="badge {{ $item->booked == 0 ? 'badge-warning' : 'badge-success' }} my-3 my-lg-0 ml-lg-3">{{ $item->booked == 0 ? 'Open' : 'Booked' }}</span>
        </td>
        <td style="display:flex;">
            <a type="button" class="btn btn-info" href="{{ route('admin.appointment.show', $item->id) }}">View</a>
            @if($item->booked == 1)
            
            
            <form method="POST" action="{{ route('admin.appointment.cancel', $item->id) }}">
              @csrf
              <button role="submit" style="margin-left:5px;" class="btn btn-warning">Cancel</button>
            </form>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

</div>


{{-- {{ $schedules->links() }} --}}

@endsection