@extends('admin.layouts.layout')

@section('body')
    <form action="{{route('property.store')}}" method="POST" enctype="multipart/form-data" class="create">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="numeric" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="">Photos</label>
            <input type="file" name="photos[]" placeholder="Photos" multiple>
        </div>
        <div class="form-group">
            <label for="">Rooms</label>
            <input type="numeric" name="rooms" placeholder="Rooms">
        </div>
        <div class="form-group">
            <label for="">Bathrooms</label>
            <input type="numeric" name="bathrooms" placeholder="Bathrooms">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" placeholder="Address">
        </div>
        <div class="form-group">
            <label for="">Specify coordinates of longitude and latitude separated by a space</label>
            <input type="text" name="coordinates" placeholder="Coordinates">
        </div>
        <div class="form-group">
            <label for="">Developer</label>
            <input type="text" name="developer" placeholder="Developer">
        </div>
        <div class="form-group">
            <label for="">Link to 3d scene</label>
            <input type="text" name="scene" placeholder="Link to 3d scene">
        </div>
        <div class="form-group">
            <label for="">Deadline</label>
            <input type="date" min="2022-01-01" name="deadline" placeholder="Deadline">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" placeholder="Description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">Building type</label>
            <input type="text" name="building_type" placeholder="Building type">
        </div>
        <div class="form-group">
            <label for="">District</label>
            <input type="text" name="district" placeholder="District">
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="submit">
        </div>
    </form>
@endsection
