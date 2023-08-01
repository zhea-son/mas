<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $topdoctors = Doctor::withCount('schedules')
            ->orderByDesc('schedules_count')->get();
        return view('pages.home', compact('doctors','departments','topdoctors'));
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
        $schedules = Schedule::where('complete',0)->with('doctor','appointments')->latest()->get();
        if(auth()->check())
        {$family = Patient::where('user_id', Auth::user()->id)->get();
        }else{
            $family =[];
        }
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
        $topdept = Department::withCount('schedules')
            ->orderByDesc('schedules_count')->get();
        $schedules = Schedule::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('complete',0)->latest()->get();
        if(auth()->check())
        {$family = Patient::where('user_id', Auth::user()->id)->get();
        }else{
            $family =[];
        }
        return view('pages.appointments',compact('family','schedules','doctors','departments','topdept'));
    }
    public function search_date(Request $request){
        $oldvalues['search_name'] = "";
        $oldvalues['search_tag'] = "";
        $oldvalues['search_date'] = "";
        if($request->search_tag == "doctor"){
            $oldvalues['search_tag'] = "doctor";
            $oldvalues['search_name'] = $request->search_name;
            $oldvalues['search_date'] = $request->search_date;
            $item = Doctor::where('name', $request->search_name)->first();
            if($request->search_date != null){
                $schedules = Schedule::where('doctor_id',$item->id)->whereDate('date', $request->search_date)->where('complete',false)->with('doctor','department')->latest()->get();
            }else{
                $schedules = Schedule::where('doctor_id',$item->id)->where('complete',false)->with('doctor')->latest()->get();
            }
        }
        else if($request->search_tag == "department"){
            $oldvalues['search_tag'] = "department";
            $oldvalues['search_name'] = $request->search_name;
            $oldvalues['search_date'] = $request->search_date;
            $item = Department::where('department', $request->search_name)->first();
            if($request->search_date != null){
                $schedules = Schedule::where('dept_id',$item->id)->whereDate('date', $request->search_date)->where('complete',false)->with('doctor','department')->latest()->get();
            }else{
                $schedules = Schedule::where('dept_id',$item->id)->where('complete',false)->with('doctor')->latest()->get();
            }
        }
        else if($request->search_tag == null && $request->search_name == null){
            if($request->search_date != null){
                $schedules = Schedule::whereDate('date', $request->search_date)->where('complete',false)->with('doctor','department')->latest()->get();
            }else{
                $schedules = Schedule::where('complete',false)->with('doctor')->latest()->get();
            }
        }
        else{
            return "Not valid!! Select either doctor or department.";
        }
        if(auth()->check())
        {$family = Patient::where('user_id', Auth::user()->id)->get();
        }else{
            $family =[];
        }

        $doctors = Doctor::all();
        $departments = Department::all();
        return view('pages.schedules', compact('doctors','departments','schedules','family','oldvalues')); 
        
    }

    public function users(){
        $users = User::where('id', '!=', 1)->get();
        return view('admin.users.index', compact('users'));
    }
}
