<style>
    .first{
        height:10%;
        background-color:rgb(0, 60, 255);
        border-bottom:2px solid black;
    }
    .first:hover{
        background-color: rgb(100, 110, 251);
    }
    
    .first span{
        margin: 12px 0px 0px 35px;
        float:left;
        font-size: 25px;
        text-align:center;
        color:black;
    }
    .active span{
        margin: 12px 0px 0px 35px;
        float:left;
        font-size: 25px;
        color:white;
        text-align:center;
    }
    .first h5{
        float:left;
        margin-top:15px;
        margin-left:5px;
        color:black;
    }
    .active h5{
        float:left;
        margin-top:15px;
        margin-left:5px;
        color:white;
    }
    .active{
        height:10%;
        background-color: rgb(100, 168, 251);
        border-bottom:2px solid black;
    }
    .second{
        height: 30%;
        background-color: rgb(0, 51, 255);
        border-bottom:2px solid black;
    }

</style>


    <div class="side-nav" style=" width:230px;height: 640px;">
        <div @if(request()->routeIs('admin.dashboard')) class="active" @else class="first" @endif><a href="{{ route('admin.dashboard') }}"><span class="fa fa-home"></span><h5>Dashboard</h5></a></div>
        <div @if(request()->routeIs('admin.doctor.*')) class="active" @else class="first" @endif><a href="{{ route('admin.doctor.index') }}"><span class="fa fa-user-md"></span><h5>Doctors</h5></a></div>
        <div @if(request()->routeIs('admin.department.*')) class="active" @else class="first" @endif><a href="{{ route('admin.department.index') }}"><span class="fa fa-building"></span><h5>Departments</h5></a></div>
        <div @if(request()->routeIs('admin.schedule.*')) class="active" @else class="first" @endif><a href="{{ route('admin.schedule.index') }}"><span class="fas fa-calendar"></span><h5>Schedules</h5></a></div>
        <div @if(request()->routeIs('admin.routine.*')) class="active" @else class="first" @endif><a href="{{ route('admin.routine.index') }}"><span class="fas fa-calendar"></span><h5>Routine</h5></a></div>
        <div @if(Route::currentRouteName() == 'checkup.*') class="active" @else class="first" @endif><a href=""><span class="fas fa-heartbeat"></span><h5>Checkups</h5></a></div>
        <div @if(Route::currentRouteName() == 'shop.*') class="active" @else class="first" @endif><a href=""><span class="fas fa-briefcase-medical"></span><h5>Shop</h5></a></div> 
        <div class="first">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="first" style="border:transparent;background-color:rgb(0, 60, 255);"><span class="fas fa-sign-out-alt"></span><h5>Log Out</h5></button>
            </form>
        </div> 
        <div class="second"></div>
    </div>

    
