<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Validator;
use App\Models\Token;
use Illuminate\Support\Str;
use Datetime;

class ApiController extends Controller
{
    //
    function list(){
        $sts = Doctor::all();
        return response()->json($sts);
    }
    function hello(){
        $st = array("id"=>1, "name"=>"Sithi Shikder","Address"=>"Dhaka");
        $st = (object)$st;
        return response()->json($st);
    }
    function create(Request $req){
         $st = new Doctor();
        $st->name = $req->namee;
        // $st->id = $req->id;
        $st->room = $req->roomm;
        $st->phone = $req->phonee;
        $st->speciality_name = $req->speciality_namee;
        $st->image= $req->imagee;
      
        $st->save(); 
        return "ok";
       // return ()->json(["msg"=>"Success","data"=>$st]);
    }



    function showbyid($id){
        $doctors = Doctor::find($id);
        return response()->json($doctors);
    }

    function updatebyid(Request $req){
        
        $st = new Doctor();
        $st->name = $req->name;
        // $st->id = $req->id;
        $st->room = $req->room;
        $st->phone = $req->phone;
        $st->speciality_name = $req->speciality_name;
        $st->image= $req->image;
      
        $st->save();
        return response()->json(["msg"=>"Success","data"=>$st]);
   
}

function deletebyid( $id){
    $doctors = Doctor::find($id);
    $doctors->delete();
    return response()->json($doctors);
}
}