<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Routine;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $schedules = Schedule::where('complete',0)->with('doctor','appointments')->get();
        $family = Patient::where('user_id', Auth::user()->id)->get();
        return view('pages.schedules', compact('doctors','departments','schedules','family'));
    }
    public function routines()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        $routines = Routine::all();
        return view('pages.routine',compact('routines','doctors','departments'));
    }
    public function appointments()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        $routines = Routine::all();
        $schedules = Schedule::where('complete',0)->get();
        return view('pages.appointments',compact('schedules','doctors','departments'));
    }
    public function search_date(Request $request){
        if($request->search_tag == "doctor"){
            $item = Doctor::where('name', $request->search_name)->first();
            if($request->search_date != null){
                $schedules = Schedule::where('doctor_id',$item->id)->where('date', $request->search_date)->where('complete',false)->with('doctor','department')->get();
            }else{
                $schedules = Schedule::where('doctor_id',$item->id)->where('complete',false)->with('doctor')->get();
            }
        }
        else if($request->search_tag == "department"){
            $item = Department::where('department', $request->search_name)->first();
            if($request->search_date != null){
                $schedules = Schedule::where('doctor_id',$item->id)->where('date', $request->search_date)->where('complete',false)->with('doctor','department')->get();
            }else{
                $schedules = Schedule::where('doctor_id',$item->id)->where('complete',false)->with('doctor')->get();
            }
        }
        else if($request->search_tag == null && $request->search_name == null){
            if($request->search_date != null){
                $schedules = Schedule::where('date', $request->search_date)->where('complete',false)->with('doctor','department')->get();
            }else{
                $schedules = Schedule::where('complete',false)->with('doctor')->get();
            }
        }
        else{
            return "Not valid!! Select either doctor or department.";
        }
        return $schedules;

        $doctors = Doctor::all();
        $departments = Department::all();
        // return $item;
        return view('pages.schedules', compact('doctors','departments','schedules')); 
        
    }

    public function users(){
        return User::where('id', '!=', 1)->get();
    }
}
