<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::whereDate('date', Carbon::now()->format('Y-m-d') )->get();
        $sids = [];
        foreach($schedules as $a){
            $sids[] = $a->id;
        }
        $bookings = Booking::whereHas('appointment', function($query) use ($sids){
            $query->whereIn('schedule_id', $sids);
        })->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'contact' => 'required',
            'remarks' => 'required',
            'appointment_id' => 'required',
        ]);
        $patient = Patient::where('contact', $request->contact)->first();
        if($patient == null){
            $patient = new Patient;
            $patient->name = $request->name;
            $patient->address = $request->address;
            $patient->contact = $request->contact;
            $patient->dob = $request->dob;
            $patient->save();
        }

        $booking = new Booking;
        $booking->patient_id = $patient->id;
        $booking->appointment_id = $request->appointment_id;
        $booking->remarks = $request->remarks;
        $booking->status = "pending";
        $saved = $booking->save();
        if($saved){
            $appointment = Appointment::find($request->appointment_id);
            $appointment->booked = 1;
            $appointment->save();
            return back();
        }
        return response()->json(["Not booked"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        // return $booking;
        return view('admin.bookings.view', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function user_store(Request $request){
        $request->validate([
            'appointment_id' => 'required',
            'patient_id' => 'required',
            'remarks' => 'required',
        ]);
        $booking = Booking::where('appointment_id', $request->appointment_id)->where('status', 'canceled')->first();
        if($booking != null){
            $booking->patient_id = $request->patient_id;
            $booking->remarks = $request->remarks;
            $booking->status = "pending";
            $saved = $booking->save();
            if($saved){
                $appointment = Appointment::find($request->appointment_id);
                $appointment->booked = 1;
                $appointment->save();
                return redirect()->route('user.bookings');
            }
        }else{
        $booking = new Booking;
        $booking->patient_id = $request->patient_id;
        $booking->appointment_id = $request->appointment_id;
        $booking->remarks = $request->remarks;
        $booking->status = "pending";
        $saved = $booking->save();
        if($saved){
            $appointment = Appointment::find($request->appointment_id);
            $appointment->booked = 1;
            $appointment->save();
            return redirect()->route('user.bookings');
        }
    }
        return response()->json(["Not booked"]);
    }

    public function user_cancel($id){
        $booking = Booking::find($id);
        $appointment = Appointment::where('id', $booking->appointment_id)->whereHas('schedule', function($query){
            $query->where('complete', false);
        })->first();
        $appointment->booked = 0;
        $saved = $appointment->save();
        if($saved){
            $booking->status = "canceled";
            $booking->save();
            return redirect()->route('user.bookings');
        }
    }

    public function get_data(Request $request){
        $date = Carbon::now();
        $sids = [];
            if ($request->status == 'today') {
                $schedules = Schedule::whereDate('date', $date)->get();
                foreach($schedules as $schedule){
                    $sids[] = $schedule->id;
                }
                $bookings = Booking::whereHas('appointment',function($query)use($sids){
                    $query->whereIn('schedule_id',$sids[]);
                })->where('status', '!=' , "canceled")->get();
            }
            $data = collect(['bookings' => $bookings]);
            return response()->json([$data]);
    }

    public function user_view($id){
        $booking = Booking::find($id);
        return view('users.bookings_view', compact('booking'));
    }
}