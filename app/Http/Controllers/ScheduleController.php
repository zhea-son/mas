<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::latest()->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.schedules.create', compact('doctors','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'doctor' => 'required',
            'department' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'time_frame' => 'required',
        ]);
        $schedule = new Schedule();
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->date = $request['date'];
        $schedule->time_frame = $request['time_frame'];
        // return $schedule->department;
        $saved = $schedule->save();
        // return $schedule;
        if($saved){
            $from = Carbon::parse($schedule->from);
            $to = Carbon::parse($schedule->to);
            $difference = ($from->diffInMinutes($to) / $schedule->time_frame);
            // return $from->format('H:i:s');
            // return Carbon::parse(gmdate("H:i:s",strtotime($from) + ($schedule->time_frame*60)));
            for($i=1;$i<=$difference;$i++){
                $appointment = new Appointment;
                $appointment->schedule_id = $schedule->id;
                $appointment->from = $from->format('H:i:s');
                $appointment->to = gmdate("H:i:s",strtotime($from) + ($schedule->time_frame*60));
                $appointment->save();
                $from = Carbon::parse($appointment->to);
            }
        }  
        return redirect()->route('admin.schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        // return $schedule;
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.schedules.edit', compact('doctors','departments','schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'doctor' => 'required',
            'department' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'time_frame' => 'required',
        ]);
        
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->date = $request['date'];
        $schedule->time_frame = $request['time_frame'];
        // return $schedule->department;
        $schedule->save();
        return redirect()->route('admin.schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
