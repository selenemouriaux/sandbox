'use strict';

function spinner() {
  let spinner = document.createElement('div')
  spinner.classList.add("psoload")

  let straight = document.createElement('div')
  straight.classList.add("straight")
  let curve = document.createElement('div')
  curve.classList.add("curve")
  let center = document.createElement('div')
  center.classList.add("center")
  let inner = document.createElement('div')
  inner.classList.add("inner")

  spinner.appendChild(straight)
  spinner.appendChild(curve)
  spinner.appendChild(center)
  spinner.appendChild(inner)

  return spinner
}

function onClickGetText() {
  let url = './appli/' + this.dataset.url
  ajaxGet(url, function (response) {
    let containerAjax = document.querySelector('#ajax')
    containerAjax.innerHTML = response
  })
}


function onClickGetJSON() {
  let url = './appli/' + this.dataset.url
  let containerAjax = document.querySelector('#ajax')
  containerAjax.innerHTML = ''
  ajaxGet(url, function (response) {
    let ul = document.createElement('ul')
    response = JSON.parse(response)
    for (let contact of response) {
      let li = document.createElement('li')
      li.textContent = `${contact.firstName} : ${contact.phone}`
      ul.append(li)
    }
    containerAjax.append(spinner())
    setTimeout(() => {
      containerAjax.innerHTML = '<br>Liste de contacts :'
      containerAjax.append(ul)
    }, 1500)
  })
}


document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('#btn-ajax-1').addEventListener('click', onClickGetText)
  document.querySelector('#btn-ajax-2').addEventListener('click', onClickGetJSON)
})
