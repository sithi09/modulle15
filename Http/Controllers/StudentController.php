<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;



class StudentController extends Controller
{
    //

    public function studentcreate(){
        return view('pages.student.studentCreate');
    }

    public function studentcreatesumitted(Request $request){

        // $student = new student();
        // $student->name = $request->name;
        // $student->student_id = $request->id;
        // $student->email = $request->email;

        // $validate = $request ->validate([

        //     "name" => "required|alpha|min:3",

        //     "email" => "required|email",
        //     "password" => "required|min:8|max:16",
        //     "phn" =>"required|regex:/(01)[0-9]{9}/",
        //     "address"=>"required|min:5|max:60"
           
            

        // ],
        // [
        //     "name.required"=>"please put your name",
        //     "email.required" =>"The Email must be a valid email address",
        //     "password.required" => "plz enter your password",
        //     "phn.required" => "plz enter your phn number",
           
        //     "address.required"=> "Enter Your Current Address"
            
        // ] 
        // );
        $student = new student();
        $student ->name = $request ->name;
        // $student ->name = $request ->name; 
        $student ->password = $request ->password;
        $student ->email = $request ->email;
        $student ->phone = $request ->phn;
        $student ->address = $request ->address;
        $student->save();
        return "submitted";


        // return view('pages.stu')
    }

    public function studentEdit(Request $request){

    
        $student = Student::where('id', $request->id)->first();
        
        return view('pages.student.studentEdit')->with('students', $student);
    }

    public function studentEditSubmitted(Request $request){

        $student = Student::where('id', $request->id)->first();

        // $student = new student();
        $student ->name = $request ->name;
        // $student ->student_id = $request ->student_id;
        $student ->password = $request ->password;
        $student ->email = $request ->email;
        $student ->phone = $request ->phn;
        $student ->address = $request ->address;
        $student->save();
        // return $student;
    
        // $student = Student::all();
        
        // $student = Student::where('id', $request->id)->first();

        
        return redirect()->route("studentslist");
    }
    public function studentList(){
        // return view('pages.student.list'); 

        $student = student::all();     

        return view('pages.student.list')->with('students', $student);

    }
}
 