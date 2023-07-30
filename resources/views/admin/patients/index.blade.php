@extends('pages.layouts.master')

@section('title', "Patients")

@section('content')
<div class="container">
<input type="text" class="form-control my-2" style="width:300px;float:right;" placeholder="Search" id="inputSearch">

<table class="table table-hover">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Date Of Birth</th>
        <th>Contact</th>
        <th>Relation</th>
        <th>Of User</th>
    </thead>
    <tbody id="myTable">
        <tr>
            @if (count($users) == 0)
            <td colspan="7">No Patients added yet.</td>
            @endif
        </tr>
        @foreach ($users as $item)
        <tr>
            <td>{{ $loop->index + 1 }}</td>    
            <td>{{ $item->name }}</td>    
            <td>{{ $item->address }}</td>    
            <td>{{ $item->dob }}</td>    
            <td>{{ $item->contact }}</td>    
            <td>{{ $item->relation }}</td>    
            <td>{{ $item->user->name }}</td>    
               
        </tr>
            @endforeach
    </tbody>
</table>
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