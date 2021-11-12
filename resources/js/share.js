document.addEventListener('DOMContentLoaded', function () {
    if (!document.contains(document.querySelector('.share-title'))) return
    share.init()
})

const share = {
    init() {
        console.log('init share.js')
        this.haveCurrencySelect()
        this.canByInput()
        this.termsMark()
    },

    haveCurrencySelect() {
        const expo_select = document.querySelector('.expo-select')
        const expo_select_input = document.querySelector('.expo-select-input')
        const select_items = document.querySelectorAll('.expo-select .expo-select__dropdown__item')

        let selected

        select_items.forEach(item => {
            item.addEventListener('click', itemClick)
        })

        function itemClick(e) {
            console.log(e, e.target.parentNode.previousElementSibling)
            selected = e.target.parentNode.previousElementSibling

            selected.dataset.value = e.target.dataset.value
            selected.replaceChildren(e.target.cloneNode(true))
            selected.parentNode.children[0].value = e.target.dataset.value
        }
    },

    canByInput() {
        const el = document.querySelector('[name="can_buy"]')

        el.addEventListener('input', function (e) {
            if (e.target.value < 10000) {
                e.target.classList.add('share-form-wrong-input')
                document.querySelector('#can-buy-input-description').innerHTML =
                    '<span style="color:red">Please enter an amount of at least $10 000</span>'
            }
            else if (e.target.value > 10000 || e.target.value == "") {
                e.target.classList.remove('share-form-wrong-input')
                document.querySelector('#can-buy-input-description').innerHTML =
                    'Minimum purchase share'
            }
        })
    },

    termsMark() {
        let submit = document.querySelector('.share-form__submit'),
            checkbox = document.querySelector('.share-form__checkbox__checkbox')

        checkbox.addEventListener('change', function () {
            if (this.checked) {
                submit.classList.remove('disabled')
                submit.removeAttribute('disabled')
            }
            else {
                submit.classList.add('disabled')
                submit.setAttribute('disabled', "")
            }
        })
    }
}