<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Specialization;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doctor::latest()->paginate(8);
        return view('admin.doctors.index', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Specialization::all();
        return view('admin.doctors.create', compact('specs'));
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
        $formFields = $request->validate([
            'name' => 'required',
            'specialization_id' => 'required',
            'degree' => 'required',
            'license' => 'required',
            'address' => 'required',
            'contact' => 'required|min:10',
            'email' => 'required|email',
        ]);
        // return $formFields;
        $dept = new Doctor;
        $dept->create($formFields);
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doc = Doctor::findOrFail($id);
        $specs = Specialization::all();
        return view('admin.doctors.edit', compact('doc','specs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $formFields = $request->validate([
            'name' => 'required',
            'specialization_id' => 'required',
            'degree' => 'required',
            'license' => 'required',
            'address' => 'required',
            'contact' => 'required|min:10',
            'email' => 'required|email',
        ]);
        $doc = Doctor::findOrFail($id);
        $doc['name'] = $formFields['name'];
        $doc['contact'] = $formFields['contact'];
        $doc['address'] = $formFields['address'];
        $doc['license'] = $formFields['license'];
        $doc['specialization_id'] = $formFields['specialization_id'];
        $doc['degree'] = $formFields['degree'];
        $doc['email'] = $formFields['email'];
        $doc->save();
        // return $doc;
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dept = Doctor::findOrFail($id);
        $dept->delete();
        return back();
    }
}
