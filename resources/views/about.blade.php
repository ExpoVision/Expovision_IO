@extends('layouts.layout')

@section('title') {{__('About')}} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}" />
@endsection

@section('body')
    <div class="gradient-layout-shit"></div>
    <div class="dirty-shit">
        <div class="dirty-shit__right about-blur">
            <h1 class="about-blur__title">ExpoVision</h1>
            <p class="about-blur__description">
                Is an innovative blockchain platform for buying and selling real estate for cryptocurrency.<br/><br/>
                We publish current offers from developers throughout Russia.
            </p>

            <div class="partners">
                <div class="partners-invest">
                    <img src="{{asset('assets/vectors/dartboard.svg')}}" alt="GOAL!" class="partners-invest__dartboard" />
                    <p class="partners-invest__description">
                        Our goal is to make investing easier for everyone!
                    </p>
                </div>

                <div class="partners-icons">
                    <img src="{{asset('assets/partners/va.svg')}}" alt="" class="parnters-icons__icon">
                    <img src="{{asset('assets/partners/mo.svg')}}" alt="" class="parnters-icons__icon">
                    <img src="{{asset('assets/partners/zayd.png')}}" alt="" class="parnters-icons__icon">
                </div>
            </div>
        </div>
    </div>
@endsection