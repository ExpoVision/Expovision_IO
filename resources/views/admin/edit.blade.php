@extends('admin.layouts.layout')

@section('body')
    <form action="{{route('property.update', ['property'=>$property->id])}}" method="POST" enctype="multipart/form-data"
          class="update">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Title</label>
            <input value="{{$property->title}}" type="text" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input value="{{$property->price}}" type="numeric" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="">Rooms</label>
            <input value="{{$property->rooms}}" type="numeric" name="rooms" placeholder="Rooms">
        </div>
        <div class="form-group">
            <label for="">Bathrooms</label>
            <input value="{{$property->bathrooms}}" type="numeric" name="bathrooms" placeholder="Bathrooms">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input value="{{$property->address}}" type="text" name="address" placeholder="Address">
        </div>
        <div class="form-group">
            <label for="">Specify coordinates of longitude and latitude separated by a space</label>
            <input value="{{$property->coordinates[0]. ' ' .$property->coordinates[1]}}" type="text" name="coordinates"
                   placeholder="Coordinates">
        </div>
        <div class="form-group">
            <label for="">Developer</label>
            <input value="{{$property->developer}}" type="text" name="developer" placeholder="Developer">
        </div>
        <div class="form-group">
            <label for="">Link to 3d scene</label>
            <input value="{{$property->scene}}" type="text" name="scene" placeholder="Link to 3d scene">
        </div>
        <div class="form-group">
            <label for="">Deadline</label>
            <input value="{{$property->deadline}}" min="2022-01-01" type="date" name="deadline" placeholder="Deadline">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" placeholder="Description" cols="30"
                      rows="10">{{$property->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Building type</label>
            <input value="{{$property->building_type}}" type="text" name="building_type" placeholder="Building type">
        </div>
        <div class="form-group">
            <label for="">District</label>
            <input value="{{$property->district}}" type="text" name="district" placeholder="District">
        </div>
        <div class="form-group">
            <label class="submit">
                <input type="submit" value="Update"/>
            </label>
        </div>
    </form>
@endsection
