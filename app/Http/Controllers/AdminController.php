<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $count =0;
        $doctors = Doctor::all();
        $users = User::all();
        $departments = Department::all();
        $patients = Patient::all();
        $families = Patient::distinct('user_id')->count();
        $schedules = Schedule::all();
        $today_schedules = Schedule::whereDate('date', Carbon::now()->format('Y-m-d'))->get();
        $bookings = Booking::where('status', '!=', "canceled")->get();
        foreach($schedules as $schedule){
            if($schedule->date == Carbon::now()->format('Y-m-d')){
                if(Carbon::parse($schedule->to) > Carbon::now() && Carbon::parse($schedule->from) < Carbon::now()){
                    $count++;
                }
            }
        }
        return view('admin.layouts.dashboard', compact('today_schedules','families','bookings','schedules','count','doctors','departments','patients','users'));
    }
}
