document.addEventListener('DOMContentLoaded', function () {
    if (!document.contains(document.querySelector('.properties-header'))) return
    properties.init()
    filter.init()
    sort.init()

    document.querySelector('.show-form').addEventListener('click', function () {
        document.querySelector('.filter').classList.add('show-filter')
        document.querySelector('.gray-layout').style.display = 'block'
        document.querySelector('.iks').addEventListener('click', function () {
            document.querySelector('.filter').classList.remove('show-filter')
            document.querySelector('.gray-layout').style.display = 'none'
        })
    })
})

const properties = {
    init() { }
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

const sort = {
    init() {
        this.setSortParameter()
    },

    setSortParameter() {
        const url = new URL(window.location.href)
        let sort_selected = document.querySelector('.sort-select__selected'),
            selected_item

        if (url.searchParams.has('sort')) {
            selected_item = document.querySelector(`[value="${url.searchParams.get('sort')}"]`)
            sort_selected.innerHTML = selected_item.innerHTML
                
        }
    }
}