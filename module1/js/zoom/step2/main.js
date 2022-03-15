'use strict';

document.querySelector('div.box').addEventListener('click', function (e) {
    console.log('je suis la div.box !')
    console.log(this)
    console.log(e.target)
})

document.querySelector('p.box').addEventListener('click', function (e) {
    console.log('je suis le p.box !')
    // e.stopPropagation()
    console.log(this)
    console.log(e)
    console.log(e.target)
})

document.querySelector('a.box').addEventListener('click', function (e) {
    console.log('je suis un lien !')
    console.log(this)
    console.log(e.target)
})

document.querySelector('nav.box').addEventListener('click', function (e) {
    if (e.target.tagName !== "A") {
        return
    }
    console.log(e.target.textContent)
})