<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }
    public function depts()
    {
        return view('pages.departments');
    }
    public function doctors()
    {
        $doctors = Doctor::latest()->paginate(12);
        return view('pages.doctors', compact('doctors'));
    }
    public function schedules()
    {
        return view('pages.schedules');
    }
}
