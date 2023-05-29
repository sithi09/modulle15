public function apiCreate(Request $req){

$admin = new Doctor();

$admin->name = $req->name;

$admin->phone = $req->phone;

$admin->room= $req->room;

$admin->speciality_name = $req->speciality_name;

$admin->image= $req->image;

$admin->save();



return "Registration success. Now back to Login";

}