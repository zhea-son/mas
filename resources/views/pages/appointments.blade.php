
@extends('layouts.main')

@section('content')

<div class="image-section">
    <img src="assets/images/consultation2.jpg" alt="" height="350px" width="100%" style="object-fit:cover;">
</div>
@include('partials._date_search')

<div class="container">
<div class="schedule-content">
    @foreach ($departments->whereIn('id',[1,2,7,12]) as $dept)
        
    <div class="schedule-content" id="schedule-content-{{ $dept->id }}">
        <div class="row">
        <div class="col-md-4"><h2>{{ $dept->department }}</h2></div>
        <div class="col-md-4"><p style="float-right;"><u>View More</u><p></div>
        </div>
    <div class="row" style="margin-top:5px;">
        @foreach ($schedules as $item)      
        <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/assets/images/doctor1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $item->doctor->name }} </h5><span style="float:right;background-color:rgb(72, 255, 0);">{{ $item->status }}</span>
                <p class="card-text">{{ $item->doctor->specialization->specialization}}, {{$item->doctor->degree}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $item->date }}</li>
                <li class="list-group-item">{{ $item->from }} to {{ $item->to }}</li>
            </ul>
            <div class="card-body" style="display:flex;">
                <a href="{{ route('admin.doctor.edit', $item->id) }}" class="card-link">Edit</a>
                <a href="#" class="card-link" style="color:teal;">Add Schedule</a>
                <form action="{{route('admin.doctor.destroy', $item->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="card-link" style="color:red;margin-left:15px;">Delete</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div><br/>
@endforeach
</div>
</div>


@endsection