<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['doctors'] = Doctor::all();
        $doctors= Doctor::all();
        return view('pages.doctors.index')->with('doctors',$doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'phone'=>'required',
            'room'=>'required',
            'speciality_name'=>'required',
            'image'=>'required'
        ]);
        $doctor = new Doctor() ;
        $doctor->name = $request->name ;
        $doctor->phone = $request->phone ;
        $doctor->room = $request->room ;
        $doctor->speciality_name = $request->speciality_name ;

        //Image Upload
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/logo_image'.$logo->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/doctor_image'),$filename);
            $doctor['image'] = $filename;
        }

        $doctor->save();
        return redirect()->back()->with('success','You Added Doctor');
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
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit',compact('doctor'));
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
        $validatedData = $request->validate([
            'name'=> 'required',
            'phone'=>'required',
            'room'=>'required',
            'speciality_name'=>'required'
        ]);
        $doctor = Doctor::find($id);
        $doctor->name = $request->name ;
        $doctor->phone = $request->phone ;
        $doctor->room = $request->room ;
        $doctor->speciality_name = $request->speciality_name ;

        //Image Upload
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/doctor_image'.$doctor->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/doctor_image'),$filename);
            $doctor['image'] = $filename;
        }

        $doctor->update();
        return redirect()->back()->with('success','You Updated these Doctor Information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if(file_exists('uploads/doctor_image/'.$doctor->image) AND !empty($doctor->image))
        {
            unlink('uploads/doctor_image/'.$doctor->image);
        }
        $doctor->delete();
        return redirect()->route('doctors.index')->with('error','doctor has been deleted');
    }
}
