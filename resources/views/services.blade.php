@extends('layouts.layout')

@section('title') Services @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/services.css')}}" />
@endsection

@section('body')
    <h1 class="services-title">{{__('Services')}}</h1>
    <div class="services-carts">
        <div class="services-cart">
            <img class="services-cart__image" src="{{asset('/assets/pages/services-1.png')}}" alt="">
            <div>
                <h2 class="services-cart__title">Investments in real estate of any type and for any period</h2>
                <p class="services-cart__description">ExpoProperty is an intermediary in your investment transaction, depriving you of unnecessary hassle with the choice of currency and legal paperwork.</p>
            </div>

            <a href="{{route('contact-us')}}" class="services-cart__info-btn">
                {{__('HOW IT WORKS')}}
            </a>
        </div>
        
        <div class="services-cart">
            <img class="services-cart__image" src="{{asset('/assets/pages/services-2.png')}}" alt="">
            <div>
                <h2 class="services-cart__title">Investments in real estate of any type and for any period</h2>
                <p class="services-cart__description">ExpoProperty is an intermediary in your investment transaction, depriving you of unnecessary hassle with the choice of currency and legal paperwork.</p>
            </div>
            
            <a href="{{route('contact-us')}}" class="services-cart__info-btn">
                {{__('HOW IT WORKS')}}
            </a>
        </div>
        
        <div class="services-cart">
            <img class="services-cart__image" src="{{asset('/assets/pages/services-3.png')}}" alt="">
            <div>
                <h2 class="services-cart__title">Investments in real estate of any type and for any period</h2>
                <p class="services-cart__description">ExpoProperty is an intermediary in your investment transaction, depriving you of unnecessary hassle with the choice of currency and legal paperwork.</p>
            </div>

            <a href="{{route('contact-us')}}" class="services-cart__info-btn">
                {{__('HOW IT WORKS')}}
            </a>
        </div>
    </div>
@endsection