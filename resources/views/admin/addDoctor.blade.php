@extends('admin.layouts')

@section('main')

<div class="offset-3 col-5 mt-4 bg-info rounded">
    <h2 class="text-white text-center mt-3 h2 font-bold">Add Doctor</h2>
    <form action="{{ route('getAddDoctorPage')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control text-white rounded">
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control text-white rounded">
        </div>
        <div class="mb-3">
            <label for="speciality">Speciality</label>
            <select name="speciality" id="speciality" class="form-control bg-white rounded">
                <option value="skin">Skin</option>
                <option value="heart">Heart</option>
                <option value="eye">Eye</option>
                <option value="nose">nose</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control text-white rounded">
        </div>
        <div class="mb-3">
            <label for="image">Doctor Image</label>
            <input type="file" name="image" id="image" class="form-control text-white rounded">
        </div>
        <div class="mb-3 text-end">
            <button class="btn btn-danger text-white rounded">Submit</button>
        </div>
    </form>
</div>
@endsection
