document.addEventListener('DOMContentLoaded', function () {
    const actual_offers_swiper = special_offers.initActualOffersSwiper()
})

let special_offers = {
    init() { },

    initActualOffersSwiper() {
        if (document.contains(document.querySelector(".actual-offers-swiper")))
        return new Swiper(".actual-offers-swiper", {
            slidesPerView: 3,
            spaceBetween: 64,
            centeredSlides: true,
            loop: true, 

            navigation: {
                // понятие не имею почему, но иначе оно не работает как надо
                // да и выяснять щас не в масть, можешь посмотреть сам
                nextEl: '.button-prev',
                prevEl: '.button-next',
            }
        });
    }
}