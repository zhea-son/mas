<style>
    .first{
        height:15%;
        /* background-color:orange; */
        border-bottom:2px solid black;
    }
    .first span{
        margin: 35px 0px 0px 35px;
        float:left;
        font-size: 25px;
        text-align:center;
    }
    .active span{
        margin: 35px 0px 0px 35px;
        float:left;
        font-size: 25px;
        text-align:center;
    }
    .first h3{
        float:left;
        margin-top:30px;
        margin-left:5px;
        
    }
    .active h3{
        float:left;
        margin-top:30px;
        margin-left:5px;
        
    }
    .active{
        height:15%;
        background-color: rgb(101, 66, 2);
        border-bottom:2px solid black;
    }

</style>

<div class="col-md-3">
    <div class="side-nav" style=" height: 605px;">
        <a href="" @if(Route::currentRouteName() == 'admin.dashboard') class="active" @else class="first" @endif><span class="fa fa-home"></span><h3>Dashboard</h3></a>
        <a href="" @if(Route::currentRouteName() == 'doctor.*') class="active" @else class="first" @endif><div class="first"><span class="fa fa-user-md"></span><h3>Doctors</h3></div></a>
        <a href="" @if(Route::currentRouteName() == 'department.*') class="active" @else class="first" @endif><div class="first"><span class="fa fa-building"></span><h3>Departments</h3></div></a>
        <a href="" @if(Route::currentRouteName() == 'schedule.*') class="active" @else class="first" @endif><div class="first"><span class="fa fa-clock-o"></span><h3>Schedules</h3></div></a>
        <a href="" @if(Route::currentRouteName() == 'checkup.*') class="active" @else class="first" @endif><div class="first"><span class="fa fa-clock-o"></span><h3>Checkups</h3></div></a>
        <a href="" @if(Route::currentRouteName() == 'shop.*') class="active" @else class="first" @endif><div class="first"><span class="fa-solid fa-calender-days"></span><h3>Shop</h3></div></a>
        
    </div>
</div>