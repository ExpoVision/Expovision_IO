@extends('layouts.layout')

@section('title') {{$property->title}} @endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/property.css') }}"/>
@endsection

@section('body')
    @include('layouts.header')
    <div class="content-frame">
        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__crumb">Home</a>
            <a href="{{route('all-properties')}}" class="breadcrumbs__crumb">All properties</a>
            <div class="breadcrumbs__crumb">{{$property->title}}</div>
        </div>

        <div class="property-header property-init">
            <div class="property-header__name">{{$property->title}}</div>
            <div class="property-header__price">{{$property->price}}</div>
        </div>

        <section class="banner-section">
            <div class="container">
                <div class="vehicle-detail-banner banner-content clearfix">
                    <div class="banner-slider">
                        <div class="slider slider-for">
                            @foreach($property->photos as $photo)
                                <div class="slider-banner-image">
                                    <img src="{{'/storage/'.$photo}}" alt="property image">
                                </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav thumb-image">
                            @foreach($property->photos as $photo)
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{'/storage/'.$photo}}" alt="property slider">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="property-content">
            <div class="right_description">
                <h1 class="description__header">{{__('Description')}}</h1>
                <div class="description-rooms">
                    <div class="description-rooms__room">
                        <span>{{ __('ROOM') }}: </span><b>{{$property->rooms}}</b>
                    </div>
                    <div class="description-rooms__room">
                        <span>{{ __('BATHROOM') }}: </span><b>{{$property->bathrooms}}</b>
                    </div>
                </div>
                <div class="description__description">
                    {!! $property->description !!}
                </div>
            </div>
            <div class="left_info">
                <a href="{{route('buy-share',['property'=>$property->id])}}" class="info__buy-btn">{{ __('Buy a share') }}</a>
                <div class="info__address">{{$property->address}}</div>
                <div class="info__map" id="property-map" data-x="{{$property->coordinates[0]}}" data-y="{{$property->coordinates[1]}}"></div>
                <div class="info__developers">
                    <div class="info__developers__li">
                        <div class="info__developers__li__description">{{ __('Developer') }}</div>
                        <div class="info__developers__li__content">
                            {{$property->developer}}
                        </div>
                    </div>
                    <div class="info__developers__li">
                        <div class="info__developers__li__description">{{ __('Deadline') }}</div>
                        <div class="info__developers__li__content">
                            {{$property->deadline}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=1ca5c829-235c-4e16-826b-299fcd0a0914"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
