'use strict';

window.addEventListener('load', function () {
  const url = 'https://pixabay.com/api/?key=25657773-b3027248f960ba55af74f8eb4'
  const container = document.querySelector('#ajax')

  function makeFigure() {
    const figure = document.createElement('figure')
    const legend = document.createElement('figcaption')
    const img = document.createElement('img')
    figure.classList.add('zoom-figure')
    legend.classList.add('zoom-caption')
    img.classList.add('zoom-picture')
    figure.id = 'pixabay'
    figure.append(img)
    figure.append(legend)
    container.insertAdjacentElement('afterend', figure)
    console.log(this)
  }

  function makeListCollection(hits) {
    console.log(hits)
    const ul = document.createElement('ul')
    ul.classList.add('zoom-list')
    hits.forEach(function (hit, index) {
      const li = document.createElement('li')
      const img = document.createElement('img')
      li.classList.add('zoom-list-item')
      img.classList.add('zoom-thumbnail')

      img.src = hit.previewURL
      img.alt = hit.tags
      img.dataset.author = hit.user
      img.dataset.page = hit.pageURL
      img.dataset.gallery = 'pixabay'
      img.dataset.url = hit.largeImageURL
      if (index === 0) {
        img.classList.add('is-active')
        document.querySelector('#pixabay img').src = hit.largeImageURL
        document.querySelector('#pixabay figcaption').textContent =
          `${hit.tags} (${hit.user})`;
      }
      img.title = 'Zoom sur l\'image'
      img.tabIndex = 0
      li.append(img)
      ul.append(li)
    })
    container.innerHTML = ''
    container.append(ul)
  }

  ajaxGet(url, function (responseJSON) {
    console.log(responseJSON)
    let response = JSON.parse(responseJSON)
    if (document.querySelector('#pixabay') === null) {
      makeFigure()
    }
    makeListCollection(response.hits)
  })

})


// var API_KEY = '25657773-b3027248f960ba55af74f8eb4';
// var URL = "https://pixabay.com/api/?key="+API_KEY+"&q="+encodeURIComponent('red
// roses'); $.getJSON(URL, function(data){ if (parseInt(data.totalHits) > 0)
// $.each(data.hits, function(i, hit){ console.log(hit.pageURL); }); else console.log('No
// hits'); });