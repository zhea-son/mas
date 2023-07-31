<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Booking;
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
        $schedules = Schedule::where('complete', false)->latest()->get();
        
        return view('admin.schedules.index', compact('schedules'));
    }

    public function checkups()
    {
        $schedules = Schedule::where('complete', true)->latest()->get();
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
        $request->validate([
            'doctor' => 'required',
            'department' => 'required',
            'date' => 'required|after:yesterday',
            'from' => 'required',
            'to' => 'required',
            'time_frame' => 'required',
        ]);
        $schedules = Schedule::where('doctor_id',$request->doctor)->whereDate('date',$request->date)->first();
        if($schedules != null){
        if (($request->from<$schedules->from && $request->to<$schedules->from) || ($request->from > $schedules->to && $request->to > $schedules->to)){
            $schedule = new Schedule();
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->date = $request['date'];
        $schedule->time_frame = $request['time_frame'];
        $saved = $schedule->save();
        if($saved){
            $from = Carbon::parse($schedule->from,'UTC');
            $to = Carbon::parse($schedule->to,'UTC');
            $difference = ($from->diffInMinutes($to) / $schedule->time_frame);
            for($i=1;$i<=$difference;$i++){
                $appointment = new Appointment;
                $appointment->schedule_id = $schedule->id;
                $appointment->from = $from->format('H:i');
                $appointment->to = $from->copy()->addMinutes($schedule->time_frame)->format('H:i');
                $appointment->save();
                $from = Carbon::parse($appointment->to,'UTC');
            }
        } 
        return redirect()->route('admin.schedule.index');
        }else{
            return response()->json(["Doctor already has schedule."]);
        }
    }else{
        $schedule = new Schedule();
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = Carbon::parse($request['from'],'UTC')->format('H:i');
        $schedule->to = Carbon::parse($request['to'],'UTC')->format('H:i');
        $schedule->date = $request['date'];
        $schedule->time_frame = $request['time_frame'];
        $saved = $schedule->save();
        if($saved){
            $from = Carbon::parse($schedule->from,'UTC');
            $to = Carbon::parse($schedule->to,'UTC');
            $difference = ($from->diffInMinutes($to) / $schedule->time_frame);
            for($i=1;$i<=$difference;$i++){
                $appointment = new Appointment;
                $appointment->schedule_id = $schedule->id;
                $appointment->from = $from->format('H:i');
                $appointment->to = $from->copy()->addMinutes($schedule->time_frame)->format('H:i');
                $appointment->save();
                $from = Carbon::parse($appointment->to,'UTC');
            }
        }  
        return redirect()->route('admin.schedule.index');
    }
        
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
        $apps = Appointment::where('schedule_id', $schedule->id)->get();
        foreach($apps as $app){
            $booking = Booking::where('appointment_id', $app->id)->first();
            if($booking != null){
                $booking->delete();
            }
            
                $app->delete();
            
        }
        $schedule->delete();
        return back();
    }

    public function view_appointments($id){
        $apps = Appointment::where('schedule_id', $id)->with('schedule')->get();
        $docid = Schedule::where('id', $id)->value('doctor_id');
        $deptid = Schedule::where('id', $id)->value('dept_id');
        $doc = Doctor::where('id',$docid)->value('name');
        $dept = Department::where('id',$deptid)->value('department');
        return view('admin.appointments.index', compact('apps','doc','dept'));
    }
    public function view_completed_appointments($id){
        $apps = Appointment::where('schedule_id', $id)->with('booking')->get();
        $docid = Schedule::where('id', $id)->value('doctor_id');
        $deptid = Schedule::where('id', $id)->value('dept_id');
        $date = Schedule::where('id', $id)->value('date');
        $doc = Doctor::where('id',$docid)->value('name');
        $dept = Department::where('id',$deptid)->value('department');
        // return $apps;
        return view('admin.appointments.checkups', compact('apps','doc','dept','date'));
    }

    public function complete($id){
        $schedule = Schedule::where('id',$id)->where('complete',false)->first();
        $apps = Appointment::where('schedule_id', $schedule->id)->where('booked', true)->get();
        if(!$apps->isEmpty()){
            foreach($apps as $app){
                $booking = Booking::where('appointment_id', $app->id)->where('status', 'pending')->first();
                $booking->status = "completed";
                $booking->complete = true;
                $booking->save();
            }
        }
        $schedule->complete = true;
        $saved = $schedule->save();
        if($saved){
            return redirect()->route('admin.checkups.index');
        }else{
            return response()->json(["Cannot Complete Schedule"]);
        }
    }

    
}
