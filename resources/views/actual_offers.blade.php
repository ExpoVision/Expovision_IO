@extends('layouts.layout')

@section('title') Actual offers @endsection

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/actual_offers.css') }}"/>
@endsection

@section('body')
    <div class="radial-gradient-layout"></div>
    <h1 class="actual-services-title">{{ __('Actual offers') }}</h1>

    <div class="swiper actual-offers-swiper">
        <div class="swiper-wrapper">
            @foreach($properties as $property)
                <div class="swiper-slide offer">
                    <div class="offer-image">
                        <img src="{{asset('storage/'.$property->photos[0])}}" alt="" class="offer-image__image"/>
                        <a href="{{$property->scene}}" class="offer-image__3d-view">{{__('3d view')}}</a>
                    </div>
                    <div class="offer-info">
                        <div class="offer-info__title">{{$property->title}}</div>
                        <div class="offer-info__address">{{$property->address}}</div>
                        <div class="offer-info__properties">
                            <div class="offer-info__properties__property">
                                <span>ROOM:</span><b>{{$property->rooms}}</b>
                            </div>
                            <div class="offer-info__properties__property">
                                <span>BATHROOM:</span><b>{{$property->bathrooms}}</b>
                            </div>
                        </div>
                        <div class="offer-info__footer">
                            <div class="offer-info__footer__price">{{$property->price}}</div>
                            <a href="{{route('property.show',['property'=>$property->id])}}" class="offer-info__footer__tolink">{{__('view property')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="button-prev"></div>
        <div class="button-next"></div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
