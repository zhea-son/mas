@extends('pages.layouts.master')

@section('content')

<div class="container">
    <a href="/admin/routine"><u>Back</u></a>
    <form method="post" action="{{route('admin.routine.store')}}">
        @csrf
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3"><label class="form-control">Doctor:</label></div>
        <div class="col-md-6">
            <select name="doctor" class="form-control">
                <option value="">-- Select Doctor</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{$doctor->name}}, {{ $doctor->specialization->specialization }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3"><label class="form-control">Department:</label></div>
        <div class="col-md-6">
            <select name="department" class="form-control">
                <option value="">-- Select Department</option>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{$department->department}}</option>
                @endforeach
            </select>
        </div>
        </div>
        
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">From:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="from">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">To:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="to">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">Days:</label></div>
            <div class="col-md-6">
                @foreach ($days as $day)
                <input type="checkbox" name="{{ $day->day }}"> <label>{{ $day->day }}</label>
                @endforeach
                
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Add Routine</button>
            </div>
        </div>
        
    </form>
</div>

@endsection