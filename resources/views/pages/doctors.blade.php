@extends('layouts.main')

@section('content')

<div class="image-section">
    <img src="assets/images/consultation2.jpg" alt="" height="350px" width="100%" style="object-fit:cover;">
</div>
@include('partials._date_search')

<div class="row" style="margin-top:25px;margin-left:5px;">
    @foreach ($doctors as $doctor)
        
    
    <div class="col-md-3 mb-5">
        <div class="card">
            <img class="card-img-top" src="/assets/images/doctor1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$doctor->name}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">View Detail</a>
            </div>
        </div>
    </div>

    @endforeach
    
</div>
    
@endsection