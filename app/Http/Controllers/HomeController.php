<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Routine;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('pages.home', compact('doctors','departments'));
    }
    public function depts()
    {
        return view('pages.departments');
    }
    public function doctors()
    {
        $doctors = Doctor::latest()->get();
        $departments = Department::all();
        return view('pages.doctors', compact('doctors','departments'));
    }
    public function schedules()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        $schedules = Schedule::where('complete',0)->get();
        return view('pages.schedules', compact('doctors','departments','schedules'));
    }
    public function routines()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        $routines = Routine::all();
        return view('pages.routine',compact('routines','doctors','departments'));
    }
    public function search(Request $request){
        // return $request;
        if($request->doctor != null && $request->department == null){
            $schedules = Schedule::where('doctor_id',$request->doctor)->where('complete',false)->get();
        }
        else if($request->doctor == null && $request->department != null){
            $schedules = Schedule::where('dept_id',$request->department)->where('complete',false)->get();
        }
        else if($request->doctor == null && $request->department == null){
            $schedules = Schedule::where('complete',false)->get();
        }
        else{
            return "Not valid!! Select either doctor or department.";
        }

        $doctors = Doctor::all();
        $departments = Department::all();
        return $schedules;
        return view('pages.schedules', compact('doctors','departments','schedules')); 
        
    }
}
