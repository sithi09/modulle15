@extends('layouts.app')
@section('content')
<h2>Edit Doctor</h2>

<div class="card-body">
    <div class="card">
        <div class="card-body">
           <form method="post" action="{{ route('doctors.update',$doctor->id) }}" enctype="multipart/form-data">
            <div class="row">
                @csrf

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input id="name" type="text" value="{{$doctor->name}}" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>

                    @error('name')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input id="phone" type="number" value="{{$doctor->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" autofocus>

                    @error('phone')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="room">Room</label>
                    <input id="room" type="text" value="{{$doctor->room}}" class="form-control @error('room') is-invalid @enderror" name="room"  autofocus>

                    @error('room')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="speciality_name">Sepeciality Name</label>

                    <select name="speciality_name" id="speciality_name" class="form-control">
                        <option value="">Select Speciality Name</option>
                        <option value="Cardiology"{{($doctor->speciality_name=="Cardiology")?"selected":""}}>Cardiology</option>
                        <option value="Surgery"{{($doctor->speciality_name=="Surgery")?"selected":""}}>Surgery</option>
                    </select>

                    @error('speciality_name')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>
                <div class="col-5" style="padding-top: 10px;">
                    <img id="showImage" src="{{!empty($doctor->image) ? url('uploads/doctor_image/'.$doctor->image):url('/uploads/no_image.jpg')}}" alt="User profile picture" style="width:150px; height:160px; border:1px solid #000;">

                </div>
                <div class="col-2" style="padding-top: 30px;">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

<script src="{{asset('js/min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endpush
