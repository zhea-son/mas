@extends('pages.layouts.master')

@section('title', "All Bookings")


@section('content')
<div class="container">
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
            <td>{{ $item->patient->name }}</td>    
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

<script>

function getData(value){
    $.ajax({
                url: "{{ route('admin.bookings.getdata') }}",
                type: 'get',
                data: {
                    status: value
                },
                success: function(response) {

                }
            });

}

</script>

@endsection


