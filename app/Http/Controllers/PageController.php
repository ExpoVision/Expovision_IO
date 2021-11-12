<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('next')) $property = Property::latest()->take(1)->first();
        else $property = Property::where('id', '>', $request->get('next'))->first();

        $properties = Property::all()->take(10);
        $min_price = Property::min('price');
        $max_price = Property::max('price');
        $filter_data = [
            'building_types' => Property::select('building_type')->distinct()->pluck('building_type')->toArray(),
            'district' => Property::select('district')->distinct()->pluck('district')->toArray(),
            'price' => [
                [$min_price, $min_price * 2],
                [$min_price * 2, $min_price * 3],
                [$min_price * 4, $min_price * 5],
                [$max_price]
            ],
        ];

        return view('home', compact('property', 'filter_data', 'properties'));
    }

    public function actual(Request $request)
    {
        $properties = Property::all()->take(10);

        return view('actual_offers', compact('properties'));
    }

    public function show(Request $request, Property $property)
    {
        return view('pages/property', [
            'property' => $property
        ]);
    }

    public function share(Request $request, Property $property)
    {
        return view('pages/share', [
            'property' => $property
        ]);
    }

    public function allProperties(Request $request)
    {
        $min_price = Property::min('price');
        $max_price = Property::max('price');
        $filter_data = [
            'building_types' => Property::select('building_type')->distinct()->pluck('building_type')->toArray(),
            'district' => Property::select('district')->distinct()->pluck('district')->toArray(),
            'price' => [
                [$min_price, $min_price * 2],
                [$min_price * 2, $min_price * 3],
                [$min_price * 4, $min_price * 5],
                [$max_price]
            ],
        ];
        $properties = $this->filter($request)->get();
        $properties = $this->sort($request, $properties);

        return view('pages.all_properties', compact('filter_data', 'properties'));
    }

    private function filter(Request $request)
    {
        $params = ['building_type', 'rooms', 'deadline', 'price', 'district', 'own_price'];
        $query = Property::select('*');

        foreach ($params as $param) {
            if ($request->$param) {
                if ($param == 'building_type' || $param == 'district') $query->whereIn($param, explode(' ', $request->$param));

                if ($param == 'rooms') {
                    $rooms = explode(' ', $request->$param);

                    foreach ($rooms as $room) {
                        if ($room < 4) $query->where('rooms', $room);
                        else $query->where('rooms', '>=', $room);
                    }
                }

                if ($param == 'deadline') {
                    $deadline = explode(' ', $request->$param);

                    foreach($deadline as $year) {
                        if ($year < 2025) $query->whereYear('deadline', $year);
                        else $query->whereYear('deadline', '>=', $year);
                    }
                }

                if ($param == 'own_price') {
                    $query->where('price', '>=', $request->$param);
                }

                if ($param == 'price') {
                    $price = explode(' ', $request->$param);

                    foreach($price as $arr) {
                        $arr = explode(',', $arr);
                        if (isset($arr[1])) $query->whereBetween('price', [$arr[0], $arr[1]]);
                        else $query->where('price', '>=', $arr[0]);
                    }
                }
            }
        }

        return $query;
    }

    private function sort(Request $request, Collection $collection)
    {
        if ($request->has('sort') && $request->get('sort') != 'new') {
            if ($request->get('sort') == 'old') $collection->sortByDesc('updated_at');
            else $collection->sortBy('price', strpos('asc', $request->get('sort')));
        }

        return $collection;
    }
}
