@extends('layouts.app')
@section('content')
<table class="table table-border">
    <tr>
        <th>Name</th>
        <th>Student Id</th>
        <th>PASSWORD</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>ADDRESS</th>

        <th>ACTION</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->student_id}}</td>
    <td>{{$student->password}}</td>
    <td>{{$student->email}}</td>
    <td>{{$student->address}}</td>

    <td>{{$student->phone}}</td>
    <td><a href="/studentEdit/{{$student->id}}/{{$student->name}}">Details</a></td>

    </tr>
    @endforeach

</table>

@endsection
