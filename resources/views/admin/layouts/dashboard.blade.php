@extends('pages.layouts.master')
@section('title', "Dashboard")
@section('content')
<div class="row">
    
    <div class="col-lg-4">

        <!-- Today's revenue -->
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $schedules->where('date', Carbon\Carbon::now()->format('Y-m-d'))->count() }}</h3>
                    <div class="list-icons ml-auto">
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
                
                <div>
                    <h4>Today's Schedules</h4>
                    <div class="font-size-sm opacity-75">Total Running: {{ $count }}</div>
                    <div class="font-size-sm opacity-75">Total Completed: {{ $schedules->where('complete', true)->where('date', Carbon\Carbon::now()->format('Y-m-d'))->count() }}</div>
                </div>
            </div>

        </div>
        <!-- /today's revenue -->

    </div>
    <div class="col-lg-4">

        <!-- Today's revenue -->
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $schedules->count() }}</h3>
                    <div class="list-icons ml-auto">
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
                
                <div>
                    <h4>Total Schedules</h4>
                    <div class="font-size-sm opacity-75">Total Completed : {{ $schedules->where('complete', true)->count() }}</div>
                    <div class="font-size-sm opacity-75">Total Uncompleted : {{ $schedules->where('complete', false)->count() }}</div>
                </div>
            </div>

        </div>
        <!-- /today's revenue -->

    </div>
    <div class="col-lg-4">

        <!-- Today's revenue -->
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $bookings->where('status', "completed")->count() }}</h3>
                    <div class="list-icons ml-auto">
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
                
                <div>
                    <h4>Total Checkups</h4>
                    <div class="font-size-sm opacity-75">Total Bookings: {{ $bookings->where('status', "pending")->count() }}</div>
                    <div class="font-size-sm opacity-75">Total Appointments: {{ $bookings->count() }}</div>
                </div>
            </div>

        </div>
        <!-- /today's revenue -->

    </div>
</div>


    <div class="row">
        <div class="col-xl-6">

            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Clinic</h6>
                    
                </div>

                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-teal text-teal rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-plus3"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Doctors</div>
                                    <span class="text-muted">{{ $doctors->count() }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-watch2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Departments</div>
                                    <span class="text-muted">{{ $departments->count() }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-indigo text-indigo rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-people"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Users</div>
                                    <span class="text-muted">{{ $users->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /traffic sources -->

        </div>
        <div class="col-xl-6">

            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Patient</h6>
                    
                </div>

                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-teal text-teal rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-plus3"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Patients</div>
                                    <span class="text-muted">{{ $patients->count() }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-watch2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Families</div>
                                    <span class="text-muted">{{ $families }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-indigo text-indigo rounded-pill border-2 btn-icon mr-3">
                                    <i class="icon-people"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total Users</div>
                                    <span class="text-muted">{{ $users->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /traffic sources -->

        </div>

        
    </div>



    <div class="card-header">
        <div class="row">
        <div class="col-md-6">
            <h5 class="card-title">Today's Schedules</h5>
        </div>
        <div class="col-md-6"><input type="text" class="form-control" style="width:300px;float:right;" placeholder="Search" id="inputSearch"></div>
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
            <th scope="col">Booked</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="myTable">
            <tr>
            @if(count($today_schedules) == 0)
            <td colspan="7">No Schedules Added.</td>
            @endif
            </tr>
            @foreach($today_schedules as $schedule)
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $schedule->date }}</td>
            <td>{{ $schedule->doctor->name }}</td>
            <td>{{ $schedule->department->department }}</td>
            <td>{{ $schedule->time_frame }} minutes</td>
            <td>{{ $schedule->from }}</td>
            <td>{{ $schedule->to }}</td>
            <td><span class="badge badge-secondary">{{ $schedule->appointments->where('booked', true)->count() }}</span></td>
            <td style="display:flex;">
                @if($schedule->complete == false)
                    <a type="button" class="btn btn-info" href="{{ route('admin.schedule.appointments', $schedule->id) }}">View Appointments</a>
                @else
                    <a type="button" class="btn btn-info" href="{{ route('admin.checkups.appointments', $schedule->id) }}">View Appointments</a>
                @endif
                
                @if(Carbon\Carbon::parse($schedule->date.$schedule->to) > Carbon\Carbon::now() && Carbon\Carbon::parse($schedule->date.$schedule->from) > Carbon\Carbon::now())
                <form action="{{route('admin.schedule.destroy', $schedule->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin-left:5px;" type="submit" class="btn btn-danger">Delete</button>
                </form>
                @elseif(Carbon\Carbon::parse($schedule->date.$schedule->to) > Carbon\Carbon::now() && Carbon\Carbon::parse($schedule->date.$schedule->from) < Carbon\Carbon::now())
                <button style="margin-left:5px;" type="button" class="btn btn-secondary" disabled>Running</button>
                @elseif($schedule->complete == true)
                <button style="margin-left:5px;" type="button" class="btn btn-secondary" disabled>Completed</button>
                @else 
                <form action="{{route('admin.schedule.complete', $schedule->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <button style="margin-left:5px" type="submit" class="btn btn-warning">Complete</button>
                </form>
                @endif
                
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

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