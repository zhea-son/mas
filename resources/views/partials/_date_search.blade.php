<style>
    #btn:hover{
        background-color: rgba(255, 238, 0, 0.5);
    }
</style>

<div style="width:100%;height:100px;background-color:rgb(26, 152, 142);">
    <div class="container">
    <form class="row" action="{{route('search.date')}}" method="POST">
        @csrf
        <div class="col-md-3" >
            <input type="text" @if(isset($oldvalues)) value="{{ $oldvalues['search_name'] }}" @endif class="form-control" name="search_name" style="margin-left:5px;height:50px;margin-top:25px;" placeholder="Search Doctor / Specialization">
        </div>
            <div class="col-md-3">
                <select class="form-control" name="search_tag" style="margin-left:5px;height:50px;margin-top:25px;" >
                    <option value="">--Select</option>
                    <option value="doctor" @if(isset($oldvalues) && $oldvalues['search_tag']=="doctor") selected @endif>Doctor</option>
                    <option value="department" @if(isset($oldvalues) && $oldvalues['search_tag']=="department") selected @endif>Department</option>
                </select>
            </div>
            
    
        <div class="col-md-3" ><input type="date" @if(isset($oldvalues)) value="{{ $oldvalues['search_date'] }}" @endif class="form-control" name="search_date" style="height:50px;margin-top:25px;" min="<?php echo date('Y-m-d'); ?>">             
        </div>
        <div class="col-md-3" ><button id="btn" type="submit" class="form-control" style="height:50px;margin-top:25px;margin-right:5px;" >Search</button>
        </div>
    </form>
    </div>
</div>
