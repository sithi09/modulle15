@extends('layouts.app')
@section('content')
<table class="table table-border">
    <tr>
        <th class="text-center">Doctor Image</th>
        <th class="text-center">Doctor Name</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">Room</th>
        <th class="text-center">Speciality</th>
        <th class="text-center">ACTION</th>
    </tr>
    @if (Session::get('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
    @endif
    @foreach ($doctors as $doctor)
    <tr>
        <td class="text-center">
            <div class="widget-content-left">
                <img height="100px" width="200px" src="{{!empty($doctor->image)?url('uploads/doctor_image/'.$doctor->image):url('uploads/no_image.jpg/')}}" alt="Doctor picture">
            </div>
        </td>
        <td class="text-center">{{$doctor->name}}</td>
        <td class="text-center">{{$doctor->phone}}</td>
        <td class="text-center">{{$doctor->speciality_name}}</td>
        <td class="text-center">{{$doctor->room}}</td>
        <td class="text-center">
            <a href="{{route('doctors.edit',$doctor->id)}}" class="btn btn-primary"><span class="menu-icon"><i class="mdi mdi-edit">Edit</i></span></a>

            @if ($doctor->deletable == true)
            <a title="Delete" href="{{route('doctors.delete',$doctor->id)}}" class="btn btn-danger" id="delete">Delete</a>
            @endif
        </td>
    </tr>
    @endforeach

</table>

@endsection
