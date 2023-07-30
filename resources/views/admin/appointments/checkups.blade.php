@extends('pages.layouts.master')
@section('title',"Completed Appointments")
@section('content')

<div class="container">
    <span class="badge badge-secondary my-3 my-lg-0 ml-lg-3">{{ $doc }}</span>
    <span class="badge badge-primary my-3 my-lg-0 ml-lg-3">{{ $dept }}</span>
    <span class="badge badge-warning my-3 my-lg-0 ml-lg-3">{{ $date }}</span>
    <input type="text" class="form-control my-2" style="width:300px;float:right;" placeholder="Search" id="inputSearch">


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Patient</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Remarks</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <tr>
        @if(count($apps) == 0)
            <td colspan="7">No Appointments Added.</td>
        @endif
        </tr>
        @foreach($apps as $item)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>@if(isset($item->booking) && $item->booking->status != "canceled"){{ $item->booking->patient->name }}@else No Booking @endif</td>
        <td>{{ $item->from }}</td>
        <td>{{ $item->to }}</td>
        <td>@if(isset($item->booking) && $item->booking->status != "canceled"){{ $item->booking->remarks }}@else No Remarks @endif</td>
        
        <td style="display:flex;">
            <a type="button" class="btn btn-info" href="{{ route('admin.appointment.show', $item->id) }}">View</a>
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

function get_id(button){
  var bid = button.id;
  var itemId = bid.replace('book_button_', '');
  var app_id = document.getElementById('appointment_id');
  app_id.value = itemId;
  console.log(itemId);
}

</script>

<script>
  $("#contact").keyup(function() {
    var contact = $("#contact").val();
    $.ajax({
                url: "{{ route('admin.getpatient') }}",
                type: 'post',

                data: {
                    "_token": "{{ csrf_token() }}",
                    contact: contact
                },
                success: function(response) {
                  $('#name').val(response.name);
                  $('#dob').val(response.dob);
                  $('#address').val(response.address);
                  console.log(response.id);
                }
              });
  });

</script>

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