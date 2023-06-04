<style>
    .header-logo{
        height:100%;
        width:25%;
        background-color: green;
        float:left;
    }
    .header-logo h1{
        margin: 25px 0px 0px 75px;
        font-size: 100px;
    }
    .header-title{
        height:100%;
        width:50%;
        background-color: red;
        float:left;
    }
    .header-title p{
        font-size:30px;
        margin-top:50px;
        margin-left: 25px;
    }
    .header-user p{
        margin-top:50px;
        font-size:25px;
        margin-left:2px;
        float:left;
    }
    .header-user{
        height:100%;
        width:25%;
        float:left;
        background-color: blue;
    }
    .circle{
        float:left;
        background-color: whitesmoke;
        height:50px;
        width:50px;
        border: 2px solid black;
        margin-top:45px;
        border-radius: 25px;
    }

</style>


<div class="col-md-12">
    <div class="header-nav" style="background-color: red; height: 140px;">
        <div class="header-logo"><h1>MAS</h1></div>
        @php
            $route = explode('.',Route::currentRouteName());
            $route_name = Str::ucfirst($route[1]);    
        @endphp
        <div class="header-title"><p>Admin >> {{ $route_name }}</p></div>
        <div class="header-user">
            <div class="circle"><span class="fa fa-user" style="margin-left:16px;margin-top:15px;"></span></div>
            <p>Admin</p>
        </div>
    </div>
</div>