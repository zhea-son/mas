<div style="width:100%;height:100px;background-color:rgb(26, 152, 142);">
    <div class="container">
    <form class="row" action="{{route('search')}}" method="POST">
        @csrf
        <div class="col-md-4" ><input type="text" class="form-control" name="search_name" style="margin-left:5px;height:50px;margin-top:25px;" placeholder="Search">
            
        </div>
        <div class="col-md-4" ><select type="text" class="form-control" name="search_tag" style="height:50px;margin-top:25px;">
            <option value="">--Select </option>
            <option value="doctor">Doctor</option>
            <option value="department">Department</option>
            </select>
        </div>
        <div class="col-md-4" ><button type="submit" class="form-control" style="height:50px;margin-top:25px;margin-right:5px;" >Search</button></div>
    </form>
    </div>
</div>
