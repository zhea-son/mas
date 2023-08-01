
@extends('layouts.main')



@section('content')


    <div class="container">
    
    
        <div class="card my-5 mr-5">
        <div class="card-header">
            <h1 class="card-title">Booking Details </h1>
            <h4 class="card-title"><span >{{$booking->appointment->schedule->date}}</span> </h4>
            <h4 class="card-title"><span >{{$booking->appointment->from}}</span> - <span >{{$booking->appointment->to}}</span>  </h4>
            <h6 class="card-title">{{ $booking->appointment->schedule->department->department }}</span></h6>
        </div>
 
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-xl-6">
                    <div class="media flex-column flex-sm-row mt-0 mb-3">
                        <div class="mr-sm-3 mb-2 mb-sm-0">
                            <div class="card-img-actions">
                                <a href="#">
                                    <img src="../global_assets/images/demo/flat/1.png" class="img-fluid img-preview rounded" alt="">
                                    <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title"><a href="#">{{ $booking->appointment->schedule->doctor->name }}</a></h6>
                            <ul class="list-inline list-inline-dotted text-muted mb-2">
                                <li class="list-inline-item"><i class="icon-book-play mr-2"></i> {{ $booking->appointment->schedule->doctor->specialization->specialization }}</li>
                            </ul>
                        </div>
                    </div>
            </div>


                <div class="col-xl-6">

                    <div class="media flex-column flex-sm-row mt-0 mb-3">
                        <div class="mr-sm-3 mb-2 mb-sm-0">
                            <div class="card-img-actions">
                                <a href="#">
                                    <img src="../global_assets/images/demo/flat/21.png" class="img-fluid img-preview rounded" alt="">
                                    <span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title"><a href="#">{{ $booking->patient->name }}</a></h6>
                            <ul class="list-inline list-inline-dotted text-muted mb-2">
                                <li class="list-inline-item"><i class="icon-book-play mr-2"></i> {{ $booking->patient->dob }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            
        </div>
        <div class="card-footer">
            <h6 class="card-title">{{ $booking->remarks }}</h6>
        </div>

        </div>
        </div>
    </div>


@endsection
