@extends("layouts.app")
@section("content")

<h2> EDIT student </h2>
<form action="{{route('studentEdit')}}" class="form-group" method = "post">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    <input type="text" name="id" value="{{$students->id}}" class="form-control" readonly>
   
     
    <div class="col-md-4 form-group">
    <span>NAME</span>
    <input type="text" name="name" value="{{$students->name}}" class="form-control">
    @error("name")
    <span class="text-denger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 form-group">
    <span>PASSWORD</span>
    <input type="text" name="password" value="{{$students->password}}" class="form-control">
    @error("password")
    <span class="text-denger">{{$message}}</span>
    @enderror
</div>

<div class="col-md-4 form-group">
    <span>EMAIL</span>
    <input type="text" name="email" value="{{$students->email}}" class="form-control">
    
    @error("email")
    <span class="text-denger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 form-group">
    <span>ADDRESS</span>
    <input type="text" name="address" value="{{$students->address}}" class="form-control">
    
    @error("address")  
    <span class="text-denger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 form-group">
    <span>PHONE</span>
    <input type="text" name="phn" value="{{$students->phone}}" class="form-control">
    
    @error("phn")
    <span class="text-denger">{{$message}}</span>
    @enderror
</div>

<input type="submit"  class="btn btn-success" value="EDIT">

</form>
@endsection

