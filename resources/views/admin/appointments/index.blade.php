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
            @if($item->booked == 0)
            <button type="button" class="btn btn-success" style="margin-left:5px;" data-toggle="modal" data-target="#modal_example">Book</button>

            <div id="modal_example" class="modal fade show" tabindex="-1" style="display: hide;" aria-modal="true" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Enter Patient Details</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
  
                  <div class="modal-body">
                    
                        <form action="{{ route('admin.bookings.store') }}" method="POST">
                          @csrf
                          <input type="hidden" name="appointment_id" value="{{ $item->id }}">
                          <label>Contact</label><input type="text" name="contact" id="contact" placeholder="Enter Patient Contact" class="form-control mb-2">
                          <label>Name</label><input type="text" name="name" id="name" placeholder="Enter Patient Name" class="form-control mb-2">
                          <label>Address</label><input type="text" name="address" id="address" placeholder="Enter Patient Address" class="form-control mb-2">
                          <label>Date Of Birth</label><input type="date" name="dob" id="dob" placeholder="Enter Patient Address" class="form-control mb-2" max="<?= date('Y-m-d'); ?>">
                          <label>Remarks</label><input type="text" name="remarks" placeholder="Enter Remarks for Problem" class="form-control mb-2">
                  </div>
  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button role="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>

                </div>
              </div>
            </div>

            @else
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

@section('custom-script')

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

@endsection