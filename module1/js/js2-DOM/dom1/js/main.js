'use strict'

const menu = document.querySelectorAll('#menu > li > a')
for (let el of menu) {
    el.addEventListener('click', function (event) {
        event.preventDefault()
        this.nextElementSibling.classList.toggle('is-hidden')
        // do {
        //     e.classList.toggle('is-hidden')
        // } while (e = e.nextElementSibling)
    })
}
