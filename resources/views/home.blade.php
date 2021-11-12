@extends('layouts.layout')

@section('title') ExpoProperty @endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/jquery.fsscroll.css')}}">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <style>
        .backdrop-effect.image {
            background-image: url({{asset('storage/'.$property->photos[0])}});
        }
        .backdrop-effect.glasses {
            background-image: url(/assets/things/glasses_blur.png);
        }
        
    </style>
@endsection

@section('body')
    <div id="pagepilling" class="container">
        <div class="sections">
            <section class="section home" id="home">
                <div id="scene" class="scene">
                    <div data-depth="1.00">
                        <img class="scene_image" src="{{asset('storage/'.$property->photos[0])}}" alt="">
                    </div>
                    <div data-depth="0.00">
                        <div class="backdrop-effect glasses"></div>
                    </div>
                </div>
                @include('layouts.header')
                <h1 class="about-blur__title">ExpoVision</h1>
                <p class="about-blur__description home-title">Your real estate assistant</p>
                <div class="content-frame">
                    <form class="filter" action="{{ route('all-properties') }}" method="GET" autocomplete="off">
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

                    <div class="content-side">
                        <div class="content-side__top">
                            <a href="{{ $property->scene }}" class="content__3dview">3d view</a>
                            <div class="content__title">{{ $property->title }}</div>
                            <div class="offer-info__address">{{ $property->address }}</div>
                            <div class="offer-info__properties">
                                <div class="offer-info__properties__property">
                                    <span>ROOM:</span><b>{{ $property->rooms }}</b>
                                </div>
                                <div class="offer-info__properties__property">
                                    <span>BATHROOM:</span><b>{{ $property->bathrooms }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-side__bottom">
                        <div class="image-slider-control">
                            @foreach ($property->photos as $photo)
                                @if ($loop->first)
                                    <img src="{{ asset("storage/$photo") }}" alt="" data-path="{{ asset("storage/$photo") }}"
                                        class="image-slider-control__image image-slider-control__image_active">
                                @else
                                    <img src="{{ asset("storage/$photo") }}" alt="" data-path="{{ asset("storage/$photo") }}"
                                        class="image-slider-control__image">
                                @endif
                            @endforeach
                        </div>

                        <div class="property-line">
                            <div class="offer-info__footer__price">{{ $property->price }}</div>
                            <a href="{{ route('property.show', ['property' => $property->id]) }}" class="property-line__link">view
                                property</a>
                            <a href="{{route('home',['next'=>$property->id])}}" class="property-line__link">next property</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section about" id="about">
                <link rel="stylesheet" href="{{asset('css/about.css')}}" />

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
            </section>
            <section class="section services" id="services">
                <link rel="stylesheet" href="{{asset('css/services.css')}}" />

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
                <div class="swiper services-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
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
                        </div>
                        <div class="swiper-slide">
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
                        </div>
                        <div class="swiper-slide">
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
                    </div>
                    <div class="service-swiper-pagination"></div>
                </div>
            </section>
            <section class="section actual-offers" id="actual-offers">
                <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
                <link rel="stylesheet" href="{{ asset('css/actual_offers.css') }}"/>
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
                <div class="swiper actual-offers-swiper-mobile">
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
                </div>
                <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                <script>
                    var swiper = new Swiper(".actual-offers-swiper-mobile", {});
                </script>
            </section>
            <section class="section contact-us" id="contact-us">
                <link rel="stylesheet" href="{{asset('css/contact-us.css')}}" />

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
            </section>
        </div>

    </div>
    
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.4.0.slim.min.js" 
            integrity="sha384-7WBfQYubrFpye+dGHEeA3fHaTy/wpTFhxdjxqvK04e4orV3z+X4XC4qOX3qnkVC6" 
            crossorigin="anonymous">
    </script>
    <script src="{{asset('js/jquery.fsscroll.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.7/TweenMax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
