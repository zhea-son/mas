
@extends('layouts.main')

@section('content')

<div class="image-section">
    <img src="assets/images/consultation2.jpg" alt="" height="350px" width="100%" style="object-fit:cover;">
</div>
@include('partials._date_search')

<div class="container">
<div class="schedules-content">
    @foreach ($topdept->take(4) as $dept)
        
    <div class="schedule-content mt-5">
        <div class="row">
            <div class="col-md-4"><h2 class="">{{ $dept->department }}</h2></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{route('search.date')}}" method="post" style="float:right;">
                    @csrf
                    <input type="hidden" name="search_tag" value="department">
                    <input type="hidden" name="search_date">
                    <input type="hidden" name="search_name" value="{{$dept->department}}">
                    <button class="btn btn-secondary" role="submit">View More</button>
                </form>
            </div>
        </div>
    <div class="row" style="margin-top:5px;">
        @if(count($schedules->where('dept_id', $dept->id)) == 0)
            <p>No schedules yet. </p>
        @endif
        @foreach ($schedules->where('dept_id', $dept->id)->take(3) as $schedule)   
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    {{ $schedule->department->department }}
                </div>
                <div class="card-body">
                    <img src="/assets/images/doctor1.jpg" style="object-fit:contain" height="200px" width="100%">
                    <h5 class="card-title">Dr. {{ $schedule->doctor->name }}</h5>
                    <p class="card-text">{{ $schedule->doctor->specialization->specialization }}</p>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$schedule->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                              View Available Time Slots
                            </button>
                          </h2>
                          <div id="flush-collapseOne_{{$schedule->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    @foreach ($schedule->appointments as $item) 
                                    @if($item->booked == 0)
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary my-2 " id="book_button_{{$item->id}}" onclick="get_id(this)" data-bs-toggle="modal" data-bs-target="#modal_example">{{ $item->from }}</button>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    {{ Carbon\Carbon::parse($schedule->date)->format('jS F, Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div><br/>
@endforeach
</div>

<div id="modal_example" class="modal fade" tabindex="-1" style="display: hide;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Enter Patient Details</h5>
          <button type="button" class="close" data-bs-dismiss="modal">×</button>
          
        </div>

        <div class="modal-body">
            <div class="alert alert-primary" role="alert">
                Please <a href="{{ route('user.family') }}"><span class="text-danger">add family member</span></a> as My Family before booking. 
            </div>
            
              <form action="{{ route('user.bookings.store') }}" method="POST">
                @csrf
                <input type="hidden" name="appointment_id" id="appointment_id">
                <select name="patient_id" class="form-control mb-2">
                  <option value="">-- Select Family Member</option>
                  @foreach ($family as $item)
                      <option value="{{$item->id}}">{{$item->relation}}</option>
                  @endforeach
                <label>Remarks</label><input type="text" name="remarks" placeholder="Enter Remarks for Problem" class="form-control mb-2">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
          <button role="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

      </div>
    </div>
</div>

</div>


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
    
@endsection