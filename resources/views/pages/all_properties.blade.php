@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/all_properties.css') }}">
@endsection

@section('body')
    @include('layouts.header')
    <div class="content-frame">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}" class="breadcrumbs__crumb">Home</a>
            <a href="{{ route('all-properties') }}" class="breadcrumbs__crumb">All properties</a>
        </div>

        <h1 class="properties-header">All properties</h1>
        <form class="filter" action="{{ route('all-properties') }}" method="GET" autocomplete="off">
            <div class="iks"></div>
            <div class="filter-select">
                <input type="hidden" name="building_type" value="">
                <div class="filter-select__selected">New building type</div>
                <div class="filter-select__dropdown">
                    @foreach ($filter_data['building_types'] as $type)
                        <div class="filter-select__dropdown__item" data-value="{{ $type }}">{{ $type }}</div>
                    @endforeach
                </div>
            </div>
            <div class="filter-select">
                <input type="hidden" name="rooms" value="">
                <div class="filter-select__selected">Number of rooms</div>
                <div class="filter-select__dropdown">
                    <div class="filter-select__dropdown__item" data-value="1">1 room</div>
                    <div class="filter-select__dropdown__item" data-value="2">2 rooms</div>
                    <div class="filter-select__dropdown__item" data-value="3">3 rooms</div>
                    <div class="filter-select__dropdown__item" data-value="4">4 rooms or more</div>
                </div>
            </div>
            <div class="filter-select">
                <input type="hidden" name="deadline" value="">
                <div class="filter-select__selected">Deadline</div>
                <div class="filter-select__dropdown">
                    <div class="filter-select__dropdown__item" data-value="2022">2022</div>
                    <div class="filter-select__dropdown__item" data-value="2023">2023</div>
                    <div class="filter-select__dropdown__item" data-value="2024">2024</div>
                    <div class="filter-select__dropdown__item" data-value="2025">2025 or later</div>
                </div>
            </div>
            <div class="filter-select">
                <input type="hidden" name="price" value="">
                <div class="filter-select__selected">Price</div>
                <div class="filter-select__dropdown">
                    @foreach ($filter_data['price'] as $prices)
                        @if ($loop->last)
                            <div class="filter-select__dropdown__item" data-value="{{ $prices[0] }}">
                                ${{ $prices[0] }} or more
                            </div>
                        @else
                            <div class="filter-select__dropdown__item" data-value="{{ $prices[0] . ',' . $prices[1] }}">
                                ${{ $prices[0] }} - ${{ $prices[1] }}</div>
                        @endif
                    @endforeach
                    <input type="text" name="own_price" class="filter-select__dropdown__item__input"
                        placeholder="Enter your Price">
                </div>
            </div>
            <div class="filter-select">
                <input type="hidden" name="district" value="">
                <div class="filter-select__selected">District</div>
                <div class="filter-select__dropdown">
                    @foreach ($filter_data['district'] as $district)
                        <div class="filter-select__dropdown__item" data-value="{{ $district }}">{{ $district }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="filter-submit">
                <label class="filter-submit__label">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.8781 19.2883L13.7932 13.2033C15.0565 11.8 15.8332 9.95002 15.8332 7.91667C15.8332 3.55167 12.2815 0 7.91656 0C3.5516 0 0 3.55167 0 7.91667C0 12.2817 3.55164 15.8333 7.9166 15.8333C9.9499 15.8333 11.7999 15.0567 13.2032 13.7925L19.2882 19.8775C19.3698 19.9592 19.4765 20 19.5832 20C19.6898 20 19.7965 19.9592 19.8782 19.8783C20.0406 19.715 20.0406 19.4516 19.8781 19.2883ZM7.9166 15C4.01082 15 0.833351 11.8225 0.833351 7.9167C0.833351 4.01089 4.01078 0.833358 7.9166 0.833358C11.8224 0.833358 14.9998 4.01085 14.9998 7.91667C14.9998 11.8225 11.8224 15 7.9166 15Z"
                            fill="#0073FF" />
                    </svg>
                    <input id="" type="submit" hidden>
                </label>
            </div>
        </form>
        <div class="show-form">Search property</div>
        <div class="gray-layout"></div>
        <div class="sort-wrapper">
            <div class="how-much">Found {{ $properties->count() }} properties</div>

            <form action="{{ route('all-properties') }}" method="GET" class="sort">
                <div class="sort-select filter-select">
                    <input type="text" value="" hidden>
                    <div class="sort-select__selected filter-select__selected">Sort by</div>
                    <div class="sort-select__dropdown filter-select__dropdown">
                        <button type="submit" name="sort" value="asc price"
                            class="sort-filter__dropdown__selected filter-select__dropdown__item">Ascending price</button>
                        <button type="submit" name="sort" value="desc price"
                            class="sort-filter__dropdown__selected filter-select__dropdown__item">Decreasing price</button>
                        <button type="submit" name="sort" value="new"
                            class="sort-filter__dropdown__selected filter-select__dropdown__item">New properties</button>
                        <button type="submit" name="sort" value="old"
                            class="sort-filter__dropdown__selected filter-select__dropdown__item">Old properties</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="properties">
            @foreach ($properties as $property)
                <div class="offer">
                    <div class="offer-image">
                        <img src="{{ asset('storage/' . $property->photos[0]) }}" alt="property image"
                            class="offer-image__image" />
                        <a href="" class="offer-image__3d-view">{{ __('3d view') }}</a>
                    </div>
                    <div class="offer-info">
                        <div class="offer-info__title">{{ $property->title }}</div>
                        <div class="offer-info__address">{{ $property->address }}</div>
                        <div class="offer-info__properties">
                            <div class="offer-info__properties__property">
                                <span>ROOM:</span><b>{{ $property->rooms }}</b>
                            </div>
                            <div class="offer-info__properties__property">
                                <span>BATHROOM:</span><b>{{ $property->bathrooms }}</b>
                            </div>
                        </div>
                        <div class="offer-info__footer">
                            <div class="offer-info__footer__price">{{ $property->price }}</div>
                            <a href="{{ route('property.show', ['property' => $property->id]) }}"
                                class="offer-info__footer__tolink">{{ __('view property') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
@endsection

@section('script')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
