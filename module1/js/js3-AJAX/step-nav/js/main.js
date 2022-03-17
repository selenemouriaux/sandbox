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

function onClickGetText(e) {
  if (e.target.id !== 'btn-ajax1') {
    return
  }
  let url = './appli/' + e.target.dataset.url
  ajaxGet(url, function (response) {
    let containerAjax = document.querySelector('#ajax')
    containerAjax.innerHTML = response
  })
}

function onClickGetJSON(e) {
  if (e.target.id !== 'btn-ajax2') {
    return
  }
  let url = './appli/' + e.target.dataset.url
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

function onSubmitForm(e) {
  if (e.target.tagName !== "FORM") {
    return
  }
  e.preventDefault()
  const formData = new FormData(e.target)
  let url = "post.php?ajax=" + new Date().getTime()
  let containerAjax = document.querySelector('#ajax')
  ajaxPost(url, formData, function (response) {
    containerAjax.innerHTML = ''
    containerAjax.append(spinner())
    setTimeout(() => {
      containerAjax.innerHTML = response
    }, 1500)
  })
}

function onClickNav(e) {
  if (e.target.tagName !== "A") {
    return
  }
  e.preventDefault() //désactivation des liens
  let url = e.target.href + '?ajax=' + e.timestamp
  let containerAjax = document.querySelector('#ajax')
  containerAjax.innerHTML = ''
  ajaxGet(url, function (response) {
    containerAjax.append(spinner())
    setTimeout(() => {
      containerAjax.innerHTML = response
    }, 1500)
  })
  history.pushState({page: e.target.href}, '', e.target.href)
}

document.addEventListener('DOMContentLoaded', function () {
  document.addEventListener('click', onClickGetText)
  document.addEventListener('click', onClickGetJSON)
  document.addEventListener('submit', onSubmitForm)
  document.querySelector('.banner-nav').addEventListener('click', onClickNav)
})

window.addEventListener('popstate', function (e) {
  const url = e.state.page + '?ajax=' + e.timeStamp
  let containerAjax = document.querySelector('#ajax')
  containerAjax.innerHTML = ''
  ajaxGet(url, function (response) {
    containerAjax.append(spinner())
    setTimeout(() => {
      containerAjax.innerHTML = response
    }, 1500)
  })
})