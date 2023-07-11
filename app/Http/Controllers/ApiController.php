<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function demo($id=null){
        return $id ? Doctor::findOrFail($id) : Doctor::all();
    }

    public function add(Request $request){
        $doctor = new Doctor();
        // $doc
    }
}
