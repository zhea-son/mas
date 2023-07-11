@extends('admin.layouts.master')

@section('content')

<div class="container">
    <form method="post" action="{{route('admin.routine.update', $routine->id)}}">
        @csrf
        @method('PUT')
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3"><label class="form-control">Doctor:</label></div>
        <div class="col-md-6">
            <select name="doctor" class="form-control">
                <option value="">-- Select Doctor</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $routine->doctor->id == $doctor->id ? 'selected' : '' }}>{{$doctor->name}}, {{ $doctor->specialization->specialization }}</option>
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
                <option value="{{ $department->id }}" {{ $routine->department->id == $department->id ? 'selected' : '' }}>{{$department->department}}</option>
                @endforeach
            </select>
        </div>
        </div>
        
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">From:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="from" value="{{ $routine->from }}">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">To:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="to" value="{{ $routine->to }}">
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">Days:</label></div>
            <div class="col-md-6">
                @php $day_ids = explode(',',$routine->recurring); @endphp
                @foreach ($days as $day)
                <input type="checkbox" name="{{ $day->day }}" @if(in_array($day->id,$day_ids)) checked @endif> <label>{{ $day->day }}</label>
                @endforeach
                
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Routine</button>
            </div>
        </div>
        
    </form>
</div>

@endsection