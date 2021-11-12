document.addEventListener('DOMContentLoaded', function () {
    if (!document.contains(document.querySelector('.property-init'))) return
    property.initSliders();

    ymaps.ready(function () {
        let map = document.querySelector('#property-map'),
            myMap = new ymaps.Map('property-map', {
                center: [map.dataset.x, map.dataset.y],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            }),
            expoMark = new ymaps.Placemark([map.dataset.x, map.dataset.y], {}, {
                iconLayout: 'default#imageWithContent',
                iconImageHref: '/assets/vectors/expo-map-mark.svg',
                iconImageSize: [64, 64],
                iconImageOffset: [-24, -24],
                iconContentOffset: [15, 15],
            });

        myMap.geoObjects.add(expoMark)
        myMap.controls.remove('geolocationControl')
        myMap.controls.remove('searchControl')
        myMap.controls.remove('trafficControl')
        myMap.controls.remove('typeSelector')
        myMap.controls.remove('fullscreenControl')
        myMap.controls.remove('rulerControl')
    });
})

const property = {
    init() {
    },

    initSliders() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            vertical: true,
            arrows: false,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            verticalSwiping: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        vertical: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        vertical: false,
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        vertical: false,
                        slidesToShow: 2,
                    }
                }
            ]
        });
    }
}
