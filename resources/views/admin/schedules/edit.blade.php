@extends('pages.layouts.master')
@section('title',"Edit Schedule")

@section('content')

<div class="container">
    <a href="/admin/schedules"><u>Back</u></a>
    <form method="post" action="{{route('admin.schedule.update', $schedule->id)}}">
        @csrf
        @method('PUT')
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3"><label class="form-control">Doctor:</label></div>
        <div class="col-md-6">
            <select name="doctor" class="form-control">
                <option value="">-- Select Doctor</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $schedule->doctor->id == $doctor->id ? 'selected' : '' }}>{{$doctor->name}}, {{ $doctor->specialization->specialization }}</option>
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
                <option value="{{ $department->id }}" {{ $schedule->department->id == $department->id ? 'selected' : '' }}>{{$department->department}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">Date:</label></div>
            <div class="col-md-6">
                <input type="date" class="form-control" name="date" value="{{ $schedule->date }}" min="{{ date('Y-m-d') }}">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">From:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="from" value="{{ $schedule->from }}">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">To:</label></div>
            <div class="col-md-6">
                <input type="time" class="form-control" name="to" value="{{ $schedule->to }}">
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">Time Frame:</label></div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="time_frame" value="{{ $schedule->time_frame }}>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Schedule</button>
            </div>
        </div>
        
    </form>
</div>

@endsection