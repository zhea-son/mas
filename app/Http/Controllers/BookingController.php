<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Patient;
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
        //
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
        return $request;
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
    public function show(Booking $booking)
    {
        //
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
}
