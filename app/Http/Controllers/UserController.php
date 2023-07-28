<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_family(){
        $user = Auth::user()->id;
        if(Auth::user()->role == "user"){
            $family = Patient::where('user_id', $user)->with('bookings')->get();
            return view('users.my_family', compact('family'));
        }
    }

    public function add_member(Request $request){
        
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'contact' => 'required',
        ]);
        if(Auth::user()->role == "user"){
        $patient = Patient::where('contact', $request->contact)->first();
        if($patient == null){
            $patient = new Patient;
            $patient->name = $request->name;
            $patient->address = $request->address;
            $patient->contact = $request->contact;
            $patient->dob = $request->dob;
            $patient->relation = $request->remarks;
            $patient->user_id = Auth::user()->id;
            $patient->save();
        }else{
            return response()->json(["member already added"]);
        }
        return back();
    }
    }

    public function show_edit($id){
        return Patient::find($id);
    }

    public function edit_member($id, Request $request){
        return $request;
    }

    public function my_appointments(){
        $ids = [];
        $family = Patient::where('user_id', Auth::user()->id)->get();
        foreach($family as $item){
            $ids[] = $item->id;
        }
        $bookings = Booking::whereIn('patient_id', $ids)->get();
        return $bookings;
    }
    public function my_bookings(){
        $family = Patient::where('user_id', Auth::user()->id)->get();
        $ids = [];
        foreach($family as $item){
            $ids[] = $item->id;
        }
        return $family;
    }

    public function add_self(Request $request){
        $request->validate([
            'user_id' => 'required',
            'dob' => 'required',
        ]);
        $user = User::find($request->user_id);
        $patient = Patient::where('user_id', $user->id)->where('relation', "Self")->first();
        if($patient == null && Auth::user()->role == "user"){
            $patient = new Patient;
            $patient->name = $user->name; 
            $patient->contact = $user->contact; 
            $patient->address = $user->address; 
            $patient->dob = $request->dob; 
            $patient->relation = "Self"; 
            $patient->user_id = $request->user_id; 
            $patient->save();
            return back();
        }else{
            return response()->json(["Patient already exists"]);
        }
    }
}
