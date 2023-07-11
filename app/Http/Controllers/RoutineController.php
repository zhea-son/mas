<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Doctor;
use App\Models\Routine;
use App\Models\Department;

use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class RoutineController extends Controller
{
    public function index(){
        $schedules = Routine::all();
        $days = Day::all();
        return view('admin.routine.index', compact('schedules','days'));
    }
    
    public function create()
    {
        $doctors = Doctor::all();
        $days = Day::all();
        $departments = Department::all();
        return view('admin.routine.create', compact('doctors','departments','days'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'doctor' => 'required',
            'department' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        
        $schedule = new Routine();
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        
        if(isset($request['sunday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "1";
            }else{
                $schedule['recurring'] .= ",1";
            }
        }

        if(isset($request['monday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "2";
            }else{
                $schedule['recurring'] .= ",2";
            }
        }

        if(isset($request['tuesday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "3";
            }else{
                $schedule['recurring'] .= ",3";
            }
        }
        

        if(isset($request['wednesday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "4";
            }else{
                $schedule['recurring'] .= ",4";
            }
        }
        if(isset($request['thursday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "5";
            }else{
                $schedule['recurring'] .= ",5";
            }
        }
        if(isset($request['friday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "6";
            }else{
                $schedule['recurring'] .= ",6";
            }
        }
        if(isset($request['saturday'])){
            if(!isset($schedule['recurring'])){
                $schedule['recurring'] .= "7";
            }else{
                $schedule['recurring'] .= ",7";
            }
        }
        // return $schedule;
        // return $schedule->department;
        $schedule->save();
        return redirect()->route('admin.schedule.index');
    }

    public function edit($id)
    {
        $routine = Routine::findOrFail($id);
        $days = Day::all();
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.routine.edit', compact('doctors','departments','routine','days'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'doctor' => 'required',
            'department' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        
        $schedule = Routine::findOrFail($id);
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->recurring = "";
                
        if(isset($request['sunday'])){
            if(($schedule['recurring'])->isEmpty()){
                $schedule['recurring'] .= "1";
            }else{
                $schedule['recurring'] .= ",1";
            }
        }

        if(isset($request['monday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "2";
            }else{
                $schedule['recurring'] .= ",2";
            }
        }

        if(isset($request['tuesday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "3";
            }else{
                $schedule['recurring'] .= ",3";
            }
        }
        

        if(isset($request['wednesday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "4";
            }else{
                $schedule['recurring'] .= ",4";
            }
        }
        if(isset($request['thursday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "5";
            }else{
                $schedule['recurring'] .= ",5";
            }
        }
        if(isset($request['friday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "6";
            }else{
                $schedule['recurring'] .= ",6";
            }
        }
        if(isset($request['saturday'])){
            if(isEmpty($schedule['recurring'])){
                $schedule['recurring'] .= "7";
            }else{
                $schedule['recurring'] .= ",7";
            }
        }
        return $schedule['recurring'];
        // return $schedule->department;
        $schedule->save();
        return redirect()->route('admin.schedule.index');
    }

    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return back();
    }
}
