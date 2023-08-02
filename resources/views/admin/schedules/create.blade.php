@extends('pages.layouts.master')
@section('title',"Create Schedule")

@section('content')

<div class="container">
    <a href="/admin/schedules"><u>Back</u></a>
    <form method="post" action="{{route('admin.schedule.store')}}">
        @csrf
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3"><label class="form-control">Doctor:</label></div>
        <div class="col-md-6">
            <select id="doctor" name="doctor" class="form-control">
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
            <select id="department" name="department" class="form-control">
                <option value="">-- Select Department</option>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{$department->department}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"><label class="form-control">Date:</label></div>
            <div class="col-md-6">
                <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}">
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
            <div class="col-md-3"><label class="form-control">Time Frame:</label></div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="time_frame">
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Add Schedule</button>
            </div>
        </div>
        
    </form>
</div>

@endsection

@section('custom-script')

<script>
    $('#doctor').change(function () {
     var optionSelected = $(this).find("option:selected").text();
     var itemId = optionSelected.replace('Doctor', '');
     var search = itemId.substring(3).trimLeft() ;
     if(search == "Medicine"){
        $('#department').val($('#department option:contains("General Medicine")').val());
     }else if(search == "Ophthalmologist"){
        $('#department').val($('#department option:contains("Opthalmology")').val());
     }else{
        $("#department option").each(function() {
            var optionText = $(this).text().substring(0, 5); // Get the first 5 characters of the option text
            // console.log(optionText);
            if (optionText === search.substring(0, 5)) {
                console.log(optionText)
                $('#department').val($(this).val()); // Select the option that matches the first 5 characters
                return false; // Exit the loop if a match is found
            }
        });
     }

    });

</script>


@endsection