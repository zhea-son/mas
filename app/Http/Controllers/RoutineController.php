<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function index(){
        $schedules = Routine::all();
        return view('admin.routine.index', compact('schedules'));
    }
}
