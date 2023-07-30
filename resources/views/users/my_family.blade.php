@extends('layouts.main')

@section('title', "My Family")

@section('content')
<div class="container">
<button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#modal_example">Add Member</button>
<input type="text" class="form-control my-2" style="width:300px;float:right;" placeholder="Search" id="inputSearch">

@php if($family != null) $me = $family->where('relation', "Self")->first(); @endphp
@if(!isset($me))
<button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#modal_example1">Make me a Patient</button>
@endif
<table class="table table-hover">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Relation</th>
        <th>Address</th>
        <th>Date Of Birth</th>
        <th>Contact</th>
        <th>Action</th>
    </thead>
    <tbody id="myTable">
        <tr>
            @if (count($family) == 0)
            <td colspan="7">No members added yet.</td>
            @endif
        </tr>
        @foreach ($family as $item)
        <tr>
            <td>{{ $loop->index + 1 }}</td>    
            <td>{{ $item->name }}</td>    
            <td>{{ $item->relation }}</td>    
            <td>{{ $item->address }}</td>    
            <td>{{ $item->dob }}</td>    
            <td>{{ $item->contact }}</td>    
            <td>
                    <a style="margin-left:5px;" href="{{route('user.family.show.edit', $item->id)}}" type="button" class="btn btn-info">Edit</a>
            </td>    
        </tr>
            @endforeach
    </tbody>
</table>
</div>

<div id="modal_example" class="modal fade" tabindex="-1" style="display: hide;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Enter Patient Details</h5>
          <button type="button" class="close" data-bs-dismiss="modal">×</button>
        </div>

        <div class="modal-body">
          
              <form action="{{ route('user.add_member') }}" method="POST">
                @csrf
                <label>Contact</label><input type="text" name="contact" id="contact" placeholder="Enter Patient Contact" class="form-control mb-2">
                <label>Name</label><input type="text" name="name" id="name" placeholder="Enter Patient Name" class="form-control mb-2">
                <label>Address</label><input type="text" name="address" id="address" placeholder="Enter Patient Address" class="form-control mb-2">
                <label>Date Of Birth</label><input type="date" name="dob" id="dob" placeholder="Enter Patient Address" class="form-control mb-2" max="<?= date('Y-m-d'); ?>">
                <label>Relation</label><input type="text" name="remarks" placeholder="Father / Mother / Sibling" class="form-control mb-2">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
          <button role="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

      </div>
    </div>
</div>

<div id="modal_example1" class="modal fade" tabindex="-1" style="display: hide;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Are you sure?</h5>
          <button type="button" class="close" data-bs-dismiss="modal">×</button>
        </div>

        <div class="modal-body">
          
              <form action="{{ route('user.add_self') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <label>Date Of Birth</label><input type="date" name="dob" id="dob" placeholder="Enter Your DOB" class="form-control mb-2" max="<?= date('Y-m-d'); ?>">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
          <button role="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

      </div>
    </div>
</div>
@endsection

@section('custom-script')



<script>

$("#inputSearch").keyup(function(){
  console.log("Hi");
  var search = $(this).val().toLowerCase();
  $("#myTable tr").filter(function(){
    $(this).toggle($(this).text().toLowerCase().indexOf(
      search
    )>-1);
  });
});

</script>



@endsection