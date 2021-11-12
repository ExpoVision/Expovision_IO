@extends('admin.layouts.layout')

@section('body')
    @foreach ($properties as $property)
        <div class="property">
            <div class="property-row">
                <div class="property__title">{{ $property->title }}</div>
                <div class="property__price">{{ $property->price }}</div>
            </div>
            <label class="additional-btn">
                <span class="property-btn">additional info</span>
                <input class="additional-btn__checkbox" type="checkbox" hidden>
                <div class="property-row">
                    <div class="property-column">
                        <div>address: {{ $property->address }}</div>
                        <div>deadline: {{ $property->deadline }}</div>
                    </div>
                    <div class="property-column">
                        <div>room: {{ $property->rooms }}</div>
                        <div>bathroom: {{ $property->bathrooms }}</div>
                    </div>
                    <div class="property-column">
                        <div>building type: {{ $property->building_type }}</div>
                        <div>district: {{ $property->district }}</div>
                    </div>
                </div>
            </label>
            <label class="description-btn">
                <span class="property-btn">description</span>
                <input class="additional-btn__checkbox" type="checkbox" hidden>
                <div class="property-row">
                    <div class="property-column">
                        {{ $property->description }}
                    </div>
                </div>
            </label>
            <label class="controls-btn">
                <span class="property-btn">actions</span>
                <input class="additional-btn__checkbox" type="checkbox" hidden>
                <div class="property-row">
                    {{-- <form action="{{ route('property.show', ['property' => $property->id]) }}">
                        <input type="submit" value="Show">
                    </form> --}}
                    <form action="{{ route('property.edit', ['property' => $property->id]) }}">
                        <input type="submit" value="Edit">
                    </form>
                    <form action="{{ route('property.destroy', ['property' => $property->id]) }}">
                        @method('DELETE')
                        <input type="submit" value="Destroy">
                    </form>
                </div>
            </label>
        </div>
    @endforeach
@endsection

@section('style')
    <style>
        .property {
            margin: 3em 0;
        }

        .property-row {
            display: flex;
            gap: 2em;
        }

        .additional-btn__checkbox+.property-row {
            display: none;
        }

        .additional-btn__checkbox:checked+.property-row {
            display: block;
        }

        .property-btn {
            cursor: pointer;
            text-decoration: underline;
        }

    </style>
@endsection
