<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Specialization;

class ApiController extends Controller
{
    public function demo($id=null){
        return $id ? Doctor::findOrFail($id) : Doctor::all();
    }

    public function add(Request $request){
        // return $request;
        $specialization = new Specialization();
        $specialization->specialization = $request->specialization;
        $specialization->organ = $request->organ;
        $result = $specialization->save();
        if($result){
            return "Data has been saved";
        }else{
            return "Operation failed";
        }
    }

    public function update(Request $request, $id){
        // return "You are inside function";
        $specialization = Specialization::findOrFail($id);
        $specialization->specialization = $request->specialization;
        $specialization->organ = $request->organ;
        $result = $specialization->save();
        // return $specialization;
        if($result){
            return "Data has been updated";
        }else{
            return "Operation failed";
        }
    }
}
