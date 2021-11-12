document.addEventListener('DOMContentLoaded', function () {
    if (!document.contains(document.querySelector('.home-title'))) return
    home.init()
    filter.init()
    $('body').scrollTop()
    
    if (window.screen.width > 500) {
        $('.container').data('fs-scroll', '')

        let fs_scroll = $('.container').fsScroll({
            direction: 'vertical'
        })
    }

    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);

    $(window).scrollTop(0)

    var swiper = new Swiper(".services-slider", {
        pagination: {
          el: ".service-swiper-pagination",
        },
    });
})

const home = {
    init() {
        this.imageChange()
    },

    imageChange() {
        const images = document.querySelectorAll('.image-slider-control__image')

        images.forEach(image => {
            image.addEventListener('click', changeImage)
        })

        function changeImage(e) {
            images.forEach(image => image.classList.remove('image-slider-control__image_active'))
            e.target.classList.add('image-slider-control__image_active')

            document.querySelector('.scene_image').src = e.target.dataset.path;
        }
    },
}

const filter = {
    init() { 
        this.itemClickable()
    },
    
    itemClickable() {
        const items = document.querySelectorAll('.filter-select__dropdown__item')
        
        let input, new_val

        items.forEach(item => {
            item.addEventListener('click', itemClick)
        })

        function itemClick(e) {
            input = e.target.parentNode.parentNode.children[0]
            new_val = e.target.dataset.value

            if (!e.target.classList.contains('filter-select__dropdown__item_checked')) {
                input.value += e.target.dataset.value + ' '
                e.target.classList.add('filter-select__dropdown__item_checked')
            }
            else {
                console.log(input.value, new_val)
                input.value = input.value.replace(new_val + ' ', '')
                e.target.classList.remove('filter-select__dropdown__item_checked')
            }
        }
    }
}