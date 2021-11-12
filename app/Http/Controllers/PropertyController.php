<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::all();

        return view('admin.index', compact('properties'));
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->back();
    }

    public function edit(Property $property)
    {
        return view('admin.edit', compact('property'));
    }

    public function create(Request $request)
    {
        return view('admin.create');
    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->except('_token', '_method'));

        return redirect()->route('property.index');
    }

    public function store(Request $request)
    {
        $property = new Property();

        $property->title = $request->input('title');
        $property->price = $request->input('price');
        $property->photos = $this->savePhotos($request);
        $property->rooms = $request->input('rooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->address = $request->input('address');
        $property->coordinates = $this->saveCoordinates($request);
        $property->developer = $request->input('developer');
        $property->scene = $request->input('scene');
        $property->deadline = $request->input('deadline');
        $property->description = $request->input('description');
        $property->building_type = $request->input('building_type');
        $property->district = $request->input('district');

        $property->save();

        return redirect()->back();
    }

    private function savePhotos(Request $request)
    {
        $photos = [];
        $request_photos = $request->file('photos');

        if ($request->hasFile('photos')) {
            foreach ($request_photos as $photo) {
                array_push($photos, Storage::disk('dirty')->putFile('photos', $photo));
            }
        }

        return $photos;
    }

    private function saveCoordinates(Request $request)
    {
        return explode(' ', $request->coordinates);
    }
}
