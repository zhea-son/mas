@extends('layouts.main')

@if(Route::currentRouteName() == 'user.bookings')
@section('title', "My Bookings")
@else
@section('title', "My History")
@endif

@section('content')
<div class="container">
    @if(Route::currentRouteName() == 'user.bookings')
    <a class="btn btn-primary my-2" href="{{route('user.appointments')}}">View My History</a>
    @else
    <a class="btn btn-primary my-2" href="{{route('user.bookings')}}">View My Bookings</a>
    @endif
    <input type="text" class="form-control my-2" style="width:300px;float:right;" placeholder="Search" id="inputSearch">

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
    <tbody id="myTable">
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
                @if($item->status == "pending")
                <form action="{{route('user.bookings.cancel', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button id="hlo" role="submit" class="btn btn-warning mx-2">Cancel</button>
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

<script>

    $("#inputSearch").keyup(function(){
        console.log("Hi");
      var search = $(this).val().toLowerCase();
      $("#myTable tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(
          search
        )>-1);
      });
    });
    
</script>

@endsection


