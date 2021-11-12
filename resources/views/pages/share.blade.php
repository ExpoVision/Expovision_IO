@extends('layouts.layout')

@section('title') {{ $property->title }} @endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/share.css') }}" />
@endsection

@section('body')
    @include('layouts.header')
    <div class="content-frame">
        <div class="share-title">
            <a href="{{ url()->previous() }}" class="share-title__back-btn">{{ __('Back') }}</a>
            <h1>{{ __('Buy a share') }}</h1>
        </div>

        <form action="{{route('share-request')}}" method="post" autocomplete="off" class="share">
            @csrf
            <div class="share-left">
                <img src="{{ asset('storage/' . $property->photos[0]) }}" alt="" class="share__image">
                <h1 class="share__header">{{ $property->title }}</h1>
                <div class="share__address info__address">{{ $property->address }}</div>
                <div class="share__developers info__developers">
                    <div class="info__developers__li">
                        <div class="info__developers__li__description">{{ __('Developer') }}</div>
                        <div class="info__developers__li__content">
                            {{ $property->developer }}
                        </div>
                    </div>
                    <div class="info__developers__li">
                        <div class="info__developers__li__description">{{ __('Deadline') }}</div>
                        <div class="info__developers__li__content">
                            {{ $property->deadline }}
                        </div>
                    </div>
                </div>
                <div class="share__price property-header property-header__price">
                    {{ $property->price }}
                </div>
            </div>
            <div class="share-right">
                <form action="" method="POST" class="share-form">
                    <div class="form-group">
                        <label class="share-form-label small">
                            <span class="share-form-label__title form-group__title">{{ __('I have currency') }}</span>
                            <div class="share-form__select expo-select">
                                <input type="hidden" class="expo-select-input" name="have_currency" value="">
                                <div class="expo-select__selected" data-value="">Currency</div>
                                <ul class="expo-select__dropdown">
                                    <li class="expo-select__dropdown__item" data-value="RUB">
                                        RUB
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.762 8.77V9.868H7.812V10.66H3.762V13H2.43V10.66H0.54V9.868H2.43V0.399999H7.146C8.766 0.399999 10.026 0.765999 10.926 1.498C11.838 2.218 12.294 3.244 12.294 4.576C12.294 5.92 11.838 6.958 10.926 7.69C10.026 8.41 8.766 8.77 7.146 8.77H3.762ZM3.762 1.552V7.636H7.164C8.388 7.636 9.324 7.372 9.972 6.844C10.632 6.316 10.962 5.566 10.962 4.594C10.962 3.622 10.632 2.872 9.972 2.344C9.324 1.816 8.388 1.552 7.164 1.552H3.762Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="EUR">
                                        EUR
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.09 11.92C10.59 11.92 11.826 11.416 12.798 10.408L13.662 11.254C13.098 11.866 12.42 12.328 11.628 12.64C10.836 12.952 9.966 13.108 9.018 13.108C7.974 13.108 7.008 12.91 6.12 12.514C5.232 12.106 4.482 11.542 3.87 10.822C3.27 10.102 2.856 9.274 2.628 8.338H0.54V7.546H2.484C2.448 7.27 2.43 6.988 2.43 6.7C2.43 6.4 2.448 6.118 2.484 5.854H0.54V5.062H2.628C2.856 4.126 3.27 3.298 3.87 2.578C4.482 1.858 5.232 1.3 6.12 0.903999C7.008 0.495999 7.974 0.291999 9.018 0.291999C9.966 0.291999 10.836 0.448 11.628 0.76C12.42 1.072 13.098 1.528 13.662 2.128L12.798 2.974C11.814 1.978 10.578 1.48 9.09 1.48C7.866 1.48 6.792 1.81 5.868 2.47C4.956 3.13 4.338 3.994 4.014 5.062H10.188V5.854H3.816C3.78 6.118 3.762 6.4 3.762 6.7C3.762 6.988 3.78 7.27 3.816 7.546H10.188V8.338H4.014C4.338 9.406 4.956 10.27 5.868 10.93C6.792 11.59 7.866 11.92 9.09 11.92Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="AED">
                                        AED
                                        <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.32031 9.98242C1.78125 9.98242 1.28027 9.9502 0.817383 9.88574C0.682617 9.60449 0.615234 9.2998 0.615234 8.97168C0.615234 8.85449 0.624023 8.74023 0.641602 8.62891C0.84668 8.66992 1.11035 8.70508 1.43262 8.73438C1.75488 8.75781 2.08887 8.76953 2.43457 8.76953C2.84473 8.76953 3.24023 8.74902 3.62109 8.70801C4.00195 8.66113 4.31543 8.59082 4.56152 8.49707C4.80762 8.39746 4.93066 8.26855 4.93066 8.11035C4.93066 7.91113 4.83398 7.61816 4.64062 7.23145C4.45312 6.84473 4.16016 6.4082 3.76172 5.92188C3.36914 5.42969 2.8623 4.93457 2.24121 4.43652C2.24121 4.24902 2.29102 3.99707 2.39062 3.68066C2.49609 3.36426 2.64844 3.12402 2.84766 2.95996C3.60938 3.79785 4.23047 4.52734 4.71094 5.14844C5.19141 5.76367 5.5459 6.30566 5.77441 6.77441C6.00293 7.24316 6.11719 7.68262 6.11719 8.09277C6.11719 8.5791 5.92383 8.95996 5.53711 9.23535C5.15625 9.51074 4.67578 9.7041 4.0957 9.81543C3.51562 9.92676 2.92383 9.98242 2.32031 9.98242ZM8.8418 10.1582C8.5957 10.1582 8.38477 10.0732 8.20898 9.90332C8.0332 9.72754 7.94531 9.51953 7.94531 9.2793C7.94531 9.0332 8.0332 8.8252 8.20898 8.65527C8.38477 8.47949 8.5957 8.3916 8.8418 8.3916C9.08203 8.3916 9.29004 8.47949 9.46582 8.65527C9.6416 8.8252 9.72949 9.0332 9.72949 9.2793C9.72949 9.51953 9.6416 9.72754 9.46582 9.90332C9.29004 10.0732 9.08203 10.1582 8.8418 10.1582ZM15.8115 10.5537C15.8174 10.3662 15.8203 10.1582 15.8203 9.92969C15.8262 9.69531 15.8291 9.44922 15.8291 9.19141C15.8291 8.59375 15.8232 7.94629 15.8115 7.24902C15.7998 6.5459 15.7852 5.84863 15.7676 5.15723C15.75 4.46582 15.7295 3.83008 15.7061 3.25C15.6885 2.66406 15.6738 2.18359 15.6621 1.80859C15.6504 1.43359 15.6445 1.21973 15.6445 1.16699C15.7148 1.02637 15.8379 0.90625 16.0137 0.806641C16.1953 0.701172 16.3857 0.616211 16.585 0.551758C16.79 0.487305 16.957 0.446289 17.0859 0.428711C17.0977 0.499023 17.1064 0.607422 17.1123 0.753906C17.1182 0.894531 17.1211 1.03223 17.1211 1.16699C17.127 1.30176 17.1299 1.38672 17.1299 1.42188C17.1299 1.71484 17.127 2.13672 17.1211 2.6875C17.1211 3.23242 17.1152 3.84766 17.1035 4.5332C17.0977 5.21875 17.0889 5.91309 17.0771 6.61621C17.0654 7.31348 17.0508 7.96094 17.0332 8.55859C17.0156 9.15625 16.998 9.64258 16.9805 10.0176C16.8633 10.1699 16.6934 10.29 16.4707 10.3779C16.248 10.4658 16.0283 10.5244 15.8115 10.5537ZM15.2578 14.1309C15.1465 14.0664 15.0498 13.9697 14.9678 13.8408C14.8916 13.7119 14.8418 13.6035 14.8184 13.5156C14.9883 13.4688 15.1904 13.4219 15.4248 13.375C15.6592 13.334 15.9111 13.293 16.1807 13.252C15.7764 13.082 15.4834 12.9092 15.3018 12.7334C15.1201 12.5576 15.0293 12.335 15.0293 12.0654C15.0293 11.8076 15.1494 11.5557 15.3896 11.3096C15.6357 11.0635 15.9814 10.9404 16.4268 10.9404C16.7021 10.9404 16.9512 10.9932 17.1738 11.0986C17.4023 11.2041 17.6162 11.3418 17.8154 11.5117C17.792 11.623 17.7334 11.7256 17.6396 11.8193C17.5459 11.9131 17.458 11.9834 17.376 12.0303C17.1885 11.8955 17.0068 11.7988 16.8311 11.7402C16.6611 11.6816 16.5117 11.6523 16.3828 11.6523C16.2539 11.6523 16.1309 11.6846 16.0137 11.749C15.8965 11.8135 15.8379 11.9248 15.8379 12.083C15.8379 12.2119 15.9521 12.3496 16.1807 12.4961C16.415 12.6484 16.9043 12.8418 17.6484 13.0762C17.6484 13.1582 17.6221 13.2607 17.5693 13.3838C17.5166 13.5127 17.4551 13.6152 17.3848 13.6914C16.834 13.7324 16.374 13.8027 16.0049 13.9023C15.6416 14.0078 15.3926 14.084 15.2578 14.1309ZM19.9512 10.1582C19.7051 10.1582 19.4941 10.0732 19.3184 9.90332C19.1426 9.72754 19.0547 9.51953 19.0547 9.2793C19.0547 9.0332 19.1426 8.8252 19.3184 8.65527C19.4941 8.47949 19.7051 8.3916 19.9512 8.3916C20.1914 8.3916 20.3994 8.47949 20.5752 8.65527C20.751 8.8252 20.8389 9.0332 20.8389 9.2793C20.8389 9.51953 20.751 9.72754 20.5752 9.90332C20.3994 10.0732 20.1914 10.1582 19.9512 10.1582Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="GBP">
                                        GBP
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.888 11.848H10.944V13H0.54V11.848H2.574V7.15H0.54V6.25H2.574V4.738C2.574 3.37 3.006 2.29 3.87 1.498C4.734 0.693999 5.97 0.291999 7.578 0.291999C9.054 0.291999 10.254 0.609999 11.178 1.246L10.692 2.344C9.9 1.768 8.826 1.48 7.47 1.48C6.282 1.48 5.388 1.762 4.788 2.326C4.188 2.878 3.888 3.682 3.888 4.738V6.25H8.874V7.15H3.888V11.848Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                </ul>
                            </div>
                        </label>
                        <label class="share-form-label big">
                            <span class="share-form-label__title form-group__title">{{ __('I can buy') }}</span>
                            <input type="number" inputmode="numeric" pattern="[0-9]" name="can_buy" placeholder="10 000"
                                class="share-form-label__input">
                            <div class="share-form-label__input-element">
                                out of <span class="share-form-label__input-element__price">${{ $property->price }}</span>
                            </div>
                            <span id="can-buy-input-description"
                                class="share-form-label__description">{{ __('Minimum purchase share') }}</span>
                        </label>
                    </div>

                    <!-- <div class="form-group">
                        <label class="share-form-label medium">
                            <span class="share-form-label__title form-group__title">{{ __('Converter') }}</span>
                            <input type="number" inputmode="numeric" pattern="[0-9]" placeholder="0"
                                class="share-form-label__input">
                            <div class="share-form__select expo-select">
                                <input type="hidden" value="">
                                <div class="expo-select__selected" data-value="USD">Currency</div>
                                <ul class="expo-select__dropdown">
                                    <li class="expo-select__dropdown__item" data-value="RUB">
                                        RUB
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.762 8.77V9.868H7.812V10.66H3.762V13H2.43V10.66H0.54V9.868H2.43V0.399999H7.146C8.766 0.399999 10.026 0.765999 10.926 1.498C11.838 2.218 12.294 3.244 12.294 4.576C12.294 5.92 11.838 6.958 10.926 7.69C10.026 8.41 8.766 8.77 7.146 8.77H3.762ZM3.762 1.552V7.636H7.164C8.388 7.636 9.324 7.372 9.972 6.844C10.632 6.316 10.962 5.566 10.962 4.594C10.962 3.622 10.632 2.872 9.972 2.344C9.324 1.816 8.388 1.552 7.164 1.552H3.762Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="EUR">
                                        EUR
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.09 11.92C10.59 11.92 11.826 11.416 12.798 10.408L13.662 11.254C13.098 11.866 12.42 12.328 11.628 12.64C10.836 12.952 9.966 13.108 9.018 13.108C7.974 13.108 7.008 12.91 6.12 12.514C5.232 12.106 4.482 11.542 3.87 10.822C3.27 10.102 2.856 9.274 2.628 8.338H0.54V7.546H2.484C2.448 7.27 2.43 6.988 2.43 6.7C2.43 6.4 2.448 6.118 2.484 5.854H0.54V5.062H2.628C2.856 4.126 3.27 3.298 3.87 2.578C4.482 1.858 5.232 1.3 6.12 0.903999C7.008 0.495999 7.974 0.291999 9.018 0.291999C9.966 0.291999 10.836 0.448 11.628 0.76C12.42 1.072 13.098 1.528 13.662 2.128L12.798 2.974C11.814 1.978 10.578 1.48 9.09 1.48C7.866 1.48 6.792 1.81 5.868 2.47C4.956 3.13 4.338 3.994 4.014 5.062H10.188V5.854H3.816C3.78 6.118 3.762 6.4 3.762 6.7C3.762 6.988 3.78 7.27 3.816 7.546H10.188V8.338H4.014C4.338 9.406 4.956 10.27 5.868 10.93C6.792 11.59 7.866 11.92 9.09 11.92Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="AED">
                                        AED
                                        <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.32031 9.98242C1.78125 9.98242 1.28027 9.9502 0.817383 9.88574C0.682617 9.60449 0.615234 9.2998 0.615234 8.97168C0.615234 8.85449 0.624023 8.74023 0.641602 8.62891C0.84668 8.66992 1.11035 8.70508 1.43262 8.73438C1.75488 8.75781 2.08887 8.76953 2.43457 8.76953C2.84473 8.76953 3.24023 8.74902 3.62109 8.70801C4.00195 8.66113 4.31543 8.59082 4.56152 8.49707C4.80762 8.39746 4.93066 8.26855 4.93066 8.11035C4.93066 7.91113 4.83398 7.61816 4.64062 7.23145C4.45312 6.84473 4.16016 6.4082 3.76172 5.92188C3.36914 5.42969 2.8623 4.93457 2.24121 4.43652C2.24121 4.24902 2.29102 3.99707 2.39062 3.68066C2.49609 3.36426 2.64844 3.12402 2.84766 2.95996C3.60938 3.79785 4.23047 4.52734 4.71094 5.14844C5.19141 5.76367 5.5459 6.30566 5.77441 6.77441C6.00293 7.24316 6.11719 7.68262 6.11719 8.09277C6.11719 8.5791 5.92383 8.95996 5.53711 9.23535C5.15625 9.51074 4.67578 9.7041 4.0957 9.81543C3.51562 9.92676 2.92383 9.98242 2.32031 9.98242ZM8.8418 10.1582C8.5957 10.1582 8.38477 10.0732 8.20898 9.90332C8.0332 9.72754 7.94531 9.51953 7.94531 9.2793C7.94531 9.0332 8.0332 8.8252 8.20898 8.65527C8.38477 8.47949 8.5957 8.3916 8.8418 8.3916C9.08203 8.3916 9.29004 8.47949 9.46582 8.65527C9.6416 8.8252 9.72949 9.0332 9.72949 9.2793C9.72949 9.51953 9.6416 9.72754 9.46582 9.90332C9.29004 10.0732 9.08203 10.1582 8.8418 10.1582ZM15.8115 10.5537C15.8174 10.3662 15.8203 10.1582 15.8203 9.92969C15.8262 9.69531 15.8291 9.44922 15.8291 9.19141C15.8291 8.59375 15.8232 7.94629 15.8115 7.24902C15.7998 6.5459 15.7852 5.84863 15.7676 5.15723C15.75 4.46582 15.7295 3.83008 15.7061 3.25C15.6885 2.66406 15.6738 2.18359 15.6621 1.80859C15.6504 1.43359 15.6445 1.21973 15.6445 1.16699C15.7148 1.02637 15.8379 0.90625 16.0137 0.806641C16.1953 0.701172 16.3857 0.616211 16.585 0.551758C16.79 0.487305 16.957 0.446289 17.0859 0.428711C17.0977 0.499023 17.1064 0.607422 17.1123 0.753906C17.1182 0.894531 17.1211 1.03223 17.1211 1.16699C17.127 1.30176 17.1299 1.38672 17.1299 1.42188C17.1299 1.71484 17.127 2.13672 17.1211 2.6875C17.1211 3.23242 17.1152 3.84766 17.1035 4.5332C17.0977 5.21875 17.0889 5.91309 17.0771 6.61621C17.0654 7.31348 17.0508 7.96094 17.0332 8.55859C17.0156 9.15625 16.998 9.64258 16.9805 10.0176C16.8633 10.1699 16.6934 10.29 16.4707 10.3779C16.248 10.4658 16.0283 10.5244 15.8115 10.5537ZM15.2578 14.1309C15.1465 14.0664 15.0498 13.9697 14.9678 13.8408C14.8916 13.7119 14.8418 13.6035 14.8184 13.5156C14.9883 13.4688 15.1904 13.4219 15.4248 13.375C15.6592 13.334 15.9111 13.293 16.1807 13.252C15.7764 13.082 15.4834 12.9092 15.3018 12.7334C15.1201 12.5576 15.0293 12.335 15.0293 12.0654C15.0293 11.8076 15.1494 11.5557 15.3896 11.3096C15.6357 11.0635 15.9814 10.9404 16.4268 10.9404C16.7021 10.9404 16.9512 10.9932 17.1738 11.0986C17.4023 11.2041 17.6162 11.3418 17.8154 11.5117C17.792 11.623 17.7334 11.7256 17.6396 11.8193C17.5459 11.9131 17.458 11.9834 17.376 12.0303C17.1885 11.8955 17.0068 11.7988 16.8311 11.7402C16.6611 11.6816 16.5117 11.6523 16.3828 11.6523C16.2539 11.6523 16.1309 11.6846 16.0137 11.749C15.8965 11.8135 15.8379 11.9248 15.8379 12.083C15.8379 12.2119 15.9521 12.3496 16.1807 12.4961C16.415 12.6484 16.9043 12.8418 17.6484 13.0762C17.6484 13.1582 17.6221 13.2607 17.5693 13.3838C17.5166 13.5127 17.4551 13.6152 17.3848 13.6914C16.834 13.7324 16.374 13.8027 16.0049 13.9023C15.6416 14.0078 15.3926 14.084 15.2578 14.1309ZM19.9512 10.1582C19.7051 10.1582 19.4941 10.0732 19.3184 9.90332C19.1426 9.72754 19.0547 9.51953 19.0547 9.2793C19.0547 9.0332 19.1426 8.8252 19.3184 8.65527C19.4941 8.47949 19.7051 8.3916 19.9512 8.3916C20.1914 8.3916 20.3994 8.47949 20.5752 8.65527C20.751 8.8252 20.8389 9.0332 20.8389 9.2793C20.8389 9.51953 20.751 9.72754 20.5752 9.90332C20.3994 10.0732 20.1914 10.1582 19.9512 10.1582Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="GBP">
                                        GBP
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.888 11.848H10.944V13H0.54V11.848H2.574V7.15H0.54V6.25H2.574V4.738C2.574 3.37 3.006 2.29 3.87 1.498C4.734 0.693999 5.97 0.291999 7.578 0.291999C9.054 0.291999 10.254 0.609999 11.178 1.246L10.692 2.344C9.9 1.768 8.826 1.48 7.47 1.48C6.282 1.48 5.388 1.762 4.788 2.326C4.188 2.878 3.888 3.682 3.888 4.738V6.25H8.874V7.15H3.888V11.848Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                </ul>
                            </div>
                        </label>
                        <div class="share-form__exchange-btn"></div>
                        <label class="share-form-label medium">
                            <input type="number" inputmode="numeric" pattern="[0-9]" placeholder="0"
                                class="share-form-label__input">
                            <div class="share-form__select expo-select">
                                <input type="hidden" value="">
                                <div class="expo-select__selected" data-value="USD">Currency</div>
                                <ul class="expo-select__dropdown">
                                    <li class="expo-select__dropdown__item" data-value="RUB">
                                        RUB
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.762 8.77V9.868H7.812V10.66H3.762V13H2.43V10.66H0.54V9.868H2.43V0.399999H7.146C8.766 0.399999 10.026 0.765999 10.926 1.498C11.838 2.218 12.294 3.244 12.294 4.576C12.294 5.92 11.838 6.958 10.926 7.69C10.026 8.41 8.766 8.77 7.146 8.77H3.762ZM3.762 1.552V7.636H7.164C8.388 7.636 9.324 7.372 9.972 6.844C10.632 6.316 10.962 5.566 10.962 4.594C10.962 3.622 10.632 2.872 9.972 2.344C9.324 1.816 8.388 1.552 7.164 1.552H3.762Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="EUR">
                                        EUR
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.09 11.92C10.59 11.92 11.826 11.416 12.798 10.408L13.662 11.254C13.098 11.866 12.42 12.328 11.628 12.64C10.836 12.952 9.966 13.108 9.018 13.108C7.974 13.108 7.008 12.91 6.12 12.514C5.232 12.106 4.482 11.542 3.87 10.822C3.27 10.102 2.856 9.274 2.628 8.338H0.54V7.546H2.484C2.448 7.27 2.43 6.988 2.43 6.7C2.43 6.4 2.448 6.118 2.484 5.854H0.54V5.062H2.628C2.856 4.126 3.27 3.298 3.87 2.578C4.482 1.858 5.232 1.3 6.12 0.903999C7.008 0.495999 7.974 0.291999 9.018 0.291999C9.966 0.291999 10.836 0.448 11.628 0.76C12.42 1.072 13.098 1.528 13.662 2.128L12.798 2.974C11.814 1.978 10.578 1.48 9.09 1.48C7.866 1.48 6.792 1.81 5.868 2.47C4.956 3.13 4.338 3.994 4.014 5.062H10.188V5.854H3.816C3.78 6.118 3.762 6.4 3.762 6.7C3.762 6.988 3.78 7.27 3.816 7.546H10.188V8.338H4.014C4.338 9.406 4.956 10.27 5.868 10.93C6.792 11.59 7.866 11.92 9.09 11.92Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="AED">
                                        AED
                                        <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.32031 9.98242C1.78125 9.98242 1.28027 9.9502 0.817383 9.88574C0.682617 9.60449 0.615234 9.2998 0.615234 8.97168C0.615234 8.85449 0.624023 8.74023 0.641602 8.62891C0.84668 8.66992 1.11035 8.70508 1.43262 8.73438C1.75488 8.75781 2.08887 8.76953 2.43457 8.76953C2.84473 8.76953 3.24023 8.74902 3.62109 8.70801C4.00195 8.66113 4.31543 8.59082 4.56152 8.49707C4.80762 8.39746 4.93066 8.26855 4.93066 8.11035C4.93066 7.91113 4.83398 7.61816 4.64062 7.23145C4.45312 6.84473 4.16016 6.4082 3.76172 5.92188C3.36914 5.42969 2.8623 4.93457 2.24121 4.43652C2.24121 4.24902 2.29102 3.99707 2.39062 3.68066C2.49609 3.36426 2.64844 3.12402 2.84766 2.95996C3.60938 3.79785 4.23047 4.52734 4.71094 5.14844C5.19141 5.76367 5.5459 6.30566 5.77441 6.77441C6.00293 7.24316 6.11719 7.68262 6.11719 8.09277C6.11719 8.5791 5.92383 8.95996 5.53711 9.23535C5.15625 9.51074 4.67578 9.7041 4.0957 9.81543C3.51562 9.92676 2.92383 9.98242 2.32031 9.98242ZM8.8418 10.1582C8.5957 10.1582 8.38477 10.0732 8.20898 9.90332C8.0332 9.72754 7.94531 9.51953 7.94531 9.2793C7.94531 9.0332 8.0332 8.8252 8.20898 8.65527C8.38477 8.47949 8.5957 8.3916 8.8418 8.3916C9.08203 8.3916 9.29004 8.47949 9.46582 8.65527C9.6416 8.8252 9.72949 9.0332 9.72949 9.2793C9.72949 9.51953 9.6416 9.72754 9.46582 9.90332C9.29004 10.0732 9.08203 10.1582 8.8418 10.1582ZM15.8115 10.5537C15.8174 10.3662 15.8203 10.1582 15.8203 9.92969C15.8262 9.69531 15.8291 9.44922 15.8291 9.19141C15.8291 8.59375 15.8232 7.94629 15.8115 7.24902C15.7998 6.5459 15.7852 5.84863 15.7676 5.15723C15.75 4.46582 15.7295 3.83008 15.7061 3.25C15.6885 2.66406 15.6738 2.18359 15.6621 1.80859C15.6504 1.43359 15.6445 1.21973 15.6445 1.16699C15.7148 1.02637 15.8379 0.90625 16.0137 0.806641C16.1953 0.701172 16.3857 0.616211 16.585 0.551758C16.79 0.487305 16.957 0.446289 17.0859 0.428711C17.0977 0.499023 17.1064 0.607422 17.1123 0.753906C17.1182 0.894531 17.1211 1.03223 17.1211 1.16699C17.127 1.30176 17.1299 1.38672 17.1299 1.42188C17.1299 1.71484 17.127 2.13672 17.1211 2.6875C17.1211 3.23242 17.1152 3.84766 17.1035 4.5332C17.0977 5.21875 17.0889 5.91309 17.0771 6.61621C17.0654 7.31348 17.0508 7.96094 17.0332 8.55859C17.0156 9.15625 16.998 9.64258 16.9805 10.0176C16.8633 10.1699 16.6934 10.29 16.4707 10.3779C16.248 10.4658 16.0283 10.5244 15.8115 10.5537ZM15.2578 14.1309C15.1465 14.0664 15.0498 13.9697 14.9678 13.8408C14.8916 13.7119 14.8418 13.6035 14.8184 13.5156C14.9883 13.4688 15.1904 13.4219 15.4248 13.375C15.6592 13.334 15.9111 13.293 16.1807 13.252C15.7764 13.082 15.4834 12.9092 15.3018 12.7334C15.1201 12.5576 15.0293 12.335 15.0293 12.0654C15.0293 11.8076 15.1494 11.5557 15.3896 11.3096C15.6357 11.0635 15.9814 10.9404 16.4268 10.9404C16.7021 10.9404 16.9512 10.9932 17.1738 11.0986C17.4023 11.2041 17.6162 11.3418 17.8154 11.5117C17.792 11.623 17.7334 11.7256 17.6396 11.8193C17.5459 11.9131 17.458 11.9834 17.376 12.0303C17.1885 11.8955 17.0068 11.7988 16.8311 11.7402C16.6611 11.6816 16.5117 11.6523 16.3828 11.6523C16.2539 11.6523 16.1309 11.6846 16.0137 11.749C15.8965 11.8135 15.8379 11.9248 15.8379 12.083C15.8379 12.2119 15.9521 12.3496 16.1807 12.4961C16.415 12.6484 16.9043 12.8418 17.6484 13.0762C17.6484 13.1582 17.6221 13.2607 17.5693 13.3838C17.5166 13.5127 17.4551 13.6152 17.3848 13.6914C16.834 13.7324 16.374 13.8027 16.0049 13.9023C15.6416 14.0078 15.3926 14.084 15.2578 14.1309ZM19.9512 10.1582C19.7051 10.1582 19.4941 10.0732 19.3184 9.90332C19.1426 9.72754 19.0547 9.51953 19.0547 9.2793C19.0547 9.0332 19.1426 8.8252 19.3184 8.65527C19.4941 8.47949 19.7051 8.3916 19.9512 8.3916C20.1914 8.3916 20.3994 8.47949 20.5752 8.65527C20.751 8.8252 20.8389 9.0332 20.8389 9.2793C20.8389 9.51953 20.751 9.72754 20.5752 9.90332C20.3994 10.0732 20.1914 10.1582 19.9512 10.1582Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                    <li class="expo-select__dropdown__item" data-value="GBP">
                                        GBP
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.888 11.848H10.944V13H0.54V11.848H2.574V7.15H0.54V6.25H2.574V4.738C2.574 3.37 3.006 2.29 3.87 1.498C4.734 0.693999 5.97 0.291999 7.578 0.291999C9.054 0.291999 10.254 0.609999 11.178 1.246L10.692 2.344C9.9 1.768 8.826 1.48 7.47 1.48C6.282 1.48 5.388 1.762 4.788 2.326C4.188 2.878 3.888 3.682 3.888 4.738V6.25H8.874V7.15H3.888V11.848Z"
                                                fill="#A4A4A4" />
                                        </svg>

                                    </li>
                                </ul>
                            </div>
                        </label>
                    </div> -->

                    <div class="form-group">
                        <label class="share-form-label medium">
                            <span class="share-form-label__title form-group__title">{{ __('Name') }}</span>
                            <input type="text" name="name" class="share-form-label__input"
                                placeholder="{{ __('Enter your Name...') }}">
                        </label>
                        <label class="share-form-label medium">
                            <span class="share-form-label__title form-group__title">{{ __('E-mail') }}</span>
                            <input type="text" name="email" class="share-form-label__input"
                                placeholder="{{ __('Enter your E-mail...') }}">
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="share-form__checkbox medium">
                            <label>
                                <input type="checkbox" name="is_ok" class="share-form__checkbox__checkbox" hidden />
                                <div class="share-form__checkbox__input"></div>
                            </label>
                            <div class="share-form__checkbox__text">
                                I have read the Platform Rules and the documentation and consent to the processing of my
                                data
                            </div>
                        </div>
                        <div class="medium">
                            <input type="submit" class="share-form__submit disabled" value="{{ __('Send a request') }}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
