<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
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
        $schedules = Schedule::latest()->paginate(8);
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
        ]);
        $schedule = new Schedule();
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->date = $request['date'];
        // return $schedule->department;
        $schedule->save();
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
        ]);
        
        $schedule->doctor_id = $request['doctor'];
        $schedule->dept_id = $request['department'];
        $schedule->from = $request['from'];
        $schedule->to = $request['to'];
        $schedule->date = $request['date'];
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
