@extends('layouts.main')

@if(Route::currentRouteName() == 'user.bookings')
@section('title', "My Bookings")
@else
@section('title', "My Appointments")
@endif

@section('content')
<div class="container">
    @if(Route::currentRouteName() == 'user.bookings')
    <a class="btn btn-primary my-2" href="{{route('user.appointments')}}">View My Appointments</a>
    @else
    <a class="btn btn-primary my-2" href="{{route('user.bookings')}}">View My Bookings</a>
    @endif

<table class="table table-hover">
    <thead>
        <th>#</th>
        <th>Doctor Name</th>
        <th>Department</th>
        <th>Patient</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            @if (count($bookings) == 0)
            <td colspan="7">No Bookings Yet</td>
            @endif
        </tr>
        @foreach ($bookings as $item)
        <tr>
            <td>{{ $loop->index + 1 }}</td>    
            <td>{{ $item->appointment->schedule->doctor->name }}</td>    
            <td>{{ $item->appointment->schedule->department->department }}</td>    
            <td>{{ $item->patient->relation }}</td>    
            <td>{{ $item->appointment->schedule->date }}</td>    
            <td>{{ $item->appointment->from }}-{{ $item->appointment->to }}</td>    
            <td>{{$item->status}}
                {{-- @if($item->status == "pending")
                <span class="badge badge-info">{{ $item->status }}</span>
                @elseif($item->status == "canceled")
                <span class="badge badge-success">{{ $item->status }}</span>
                @else
                <span class="badge badge-success">{{ $item->status }}</span>
                @endif --}}
            </td>    
            <td style="display:flex;">
                <a style="margin-left:5px;" href="" type="button" class="btn btn-info">View</a>
                @if($item->status != "canceled")
                <form action="{{route('user.bookings.cancel', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button role="submit" class="btn btn-warning mx-2">Cancel</button>
                </form>
                @endif
            </td>    
        </tr>
            @endforeach
    </tbody>
</table>
</div>

@endsection

@section('custom-script')


@endsection


