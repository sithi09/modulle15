@extends('layouts.app')
@section('content')
<h2>Create Student</h2>
<div class="card-body">
    <form method="post" action="{{ route('logos.store') }}" id="myForm" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-5">
                <label class="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="col-5" style="padding-top: 10px;">
                <img id="showImage" src="{{url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:150px; height:160px; border:1px solid #000;">
                {{-- <img id="showImage" src="{{!empty($user->image)?url('/upload/user_image/'.$user->image):url('/upload/no_image.jpg')}}" height="150px" width="130px;" alt="Card image cap"/> --}}
            </div>
            <div class="col-2" style="padding-top: 30px;">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
