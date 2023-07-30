
@extends('layouts.main')

@section('content')

<div class="image-section">
    <img src="assets/images/consultation2.jpg" alt="" height="350px" width="100%" style="object-fit:cover;">
</div>
@include('partials._date_search')

<div class="container">
<div class="schedule-content">
    @foreach ($topdept->take(4) as $dept)
        
    <div class="schedule-content">
        <div class="row">
            <div class="col-md-4"><h2 class="">{{ $dept->department }}</h2></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{route('search.date')}}" method="post">
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
        @foreach ($schedules->where('dept_id', $dept->id)->take(4) as $item)   
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