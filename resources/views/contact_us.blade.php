@extends('layouts.layout')

@section('title') Contact us @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/contact-us.css')}}" />
@endsection

@section('body')
    <div class="blur-layout-shit"></div>
    <h1 class="contacts-title">{{ __('Contact us') }}</h1>
    <div class="contacts-title-description">Contact us and we will answer all your questions</div>

    <div class="contact-us-content">
        <form action="{{route('contact-request')}}" method="POST" class="contact-form">
            @csrf
            <div class="form-group">
                <label class="contact-form__label" for="">{{__('Name')}}</label>
                <input class="contact-form__input" type="text" name="name" placeholder="{{__('Enter your Name...')}}" id="" />
            </div>
            <div class="form-group">
                <label class="contact-form__label" for="">{{__('E-mail')}}</label>
                <input class="contact-form__input" type="email" name="email" placeholder="{{__('Enter your Email...')}}" id="" />
            </div>
            <div class="form-group">
                <label class="contact-form__label" for="">{{__('Message')}}</label>
                <textarea name="message" class="contact-form__input" rows="8" placeholder="{{__('Enter your Message...')}}"></textarea>
            </div>
            <div class="form-group">
                <label class="contact-form__submit">
                    <span>Submit a message</span>
                    <input type="submit" id="contact-form-submit" value="{{__('Submit a message')}}" hidden>
                </label>
            </div>
        </form>

        <div class="feedback">
            <div class="feedback-row">
                <div class="feedback-row__label contact-form__label">{{__('Number')}}</div>
                <div class="feedback-row__content">+7 (929) 444-40-95</div>
            </div>
            <div class="feedback-row">
                <div class="feedback-row__label contact-form__label">{{__('E-mail')}}</div>
                <div class="feedback-row__content">info@expovision.org</div>
            </div>
            <div class="feedback-row">
                <div class="feedback-row__label contact-form__label">{{__('Address')}}</div>
                <div class="feedback-row__content">Kadyrov Avenue, 216, Grozny,<br/>Chechen Republic, 364015</div>
            </div>
            <div class="feedback-row">
                <div class="feedback-row__label contact-form__label">{{__('Social media')}}</div>
                <div class="feedback-row__icons">
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/instagram.svg')}}" alt=""></a>
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/youtube.svg')}}" alt=""></a>
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/twitter.svg')}}" alt=""></a>
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/linkedin.svg')}}" alt=""></a>
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/discord.svg')}}" alt=""></a>
                    <a href="" class="feedback-row__icons__icon"><img src="{{asset('assets/icons/reddit.svg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection