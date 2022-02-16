'use strict';

/*******************************************************************************************
 ****************************** DECLARATION DES VARIABLES **********************************
 ******************************************************************************************/

let index;
let slides;
let pagination;


/*******************************************************************************************
 ****************************** DECLARATION DES FONCTIONS **********************************
 ******************************************************************************************/

/**
* onClickNext()
* Ecouteur d'évenement
* Permet d'avancer d'1 slide
*/
function onClickNext() {
    index++;
    if (index === slides.length) {
        index = 0;
    }
    changeSlide();
}

/**
 * onClickPrev()
 * Ecouteur d'évenement
 * Permet de reculer d'1 slide
*/
function onClickPrev() {
    index--;
    if (index < 0) {
        index = slides.length - 1;
    }
    changeSlide();
}

/**
 * changeSlide()
 * cache tout sauf la figure active
 */
function changeSlide() {
    document.querySelector('.slider-figure:not(.is-hidden)').classList.add('is-hidden');
    slides[index].classList.remove('is-hidden');
    slides[index].classList.remove('is-hidden');
    pagination.querySelector('.is-active').classList.remove('is-active');
    pagination.querySelector('[data-id="' + (index + 1) + '"]').classList.add('is-active');
}

/**
 *
 * @returns {HTMLOListElement}
 */
function makePagination() {
    let ol;
    ol = document.createElement('ol');
    ol.classList.add('slider-pagination');
    for (let i = 0; i < slides.length; i++) {
        let li;
        li = document.createElement('li');
        li.classList.add('slider-pagination-item');
        li.dataset.id = i + 1;
        ol.append(li);
        // Créer un gestionnaire d'évenement dans les li
        li.addEventListener('click', onClickPagination);
        li.addEventListener('mouseover', paginationDetail);
        li.addEventListener('mouseout', paginationBlank);
    }
    ol.firstElementChild.classList.add('is-active');
    document.querySelector('.slider').append(ol);
    return ol;
}

/**
 *
 */
function onClickPagination() {
    let dataSlide = this.dataset.id;
    dataSlide--;
    index = dataSlide;
    changeSlide();
}

/**
 *
 */
function paginationDetail() {
    this.innerHTML = this.dataset.id
}

/**
 *
 */
function paginationBlank() {
    this.innerHTML = ""
}

/**
 *
 * @param e
 */
function keyboardControl(e) {
    switch (e.key) {
        case "ArrowLeft":
        case "ArrowUp":
            onClickPrev()
            break
        case "ArrowRight":
        case "ArrowDown":
            onClickNext()
    }
}

/**
 * @description creates and inserts a new button to activate/deactivate the slideshow on the slider.
 * sets the initial display and the onclick event listener.
 */
function makeSlideShowButton() {
    let slideShowButton
    slideShowButton = document.createElement('button')
    slideShowButton.innerHTML = "Démarrer le Diaporama"
    slideShowButton.classList.add('slideShowButton'/*, 'inactive'*/)
    slideShowButton.dataset.animationId = ""
    slideShowButton.addEventListener('click', onClickSlideShow)
    document.querySelector('.slider').after(slideShowButton)
}

/**
 * Activates an interval callback on onClickNext()
 * @description checks the status examinating all object active classes and toggles slideshow ON/OFF accordingly.
 * upon click, updates the button text, class and either :
 * deletes the intervalID if active, OR,
 * sets a new interval callback and updates the global intervalId "timerId"
 */
function onClickSlideShow() {
    // let activeClasses = this.className.split(' ')
    /*activeClasses.includes('inactive')*/
    (this.dataset.animationId === '') ?
        (this.innerText = "Arrêter le diaporama",
            // this.classList.remove('inactive'),
            // this.classList.add('activated'),
            this.dataset.animationId = setInterval(onClickNext, 2000))
        :
        (this.innerText = "Relancer le diaporama",
                // this.classList.remove('activated'),
                // this.classList.add('inactive'),
                clearInterval(this.dataset.animationId),
                this.dataset.animationId = ''
        )
}

/*******************************************************************************************
 ************************ CODE EXECUTE AU CHARGEMENT DE LA PAGE ****************************
 ******************************************************************************************/

document.addEventListener('DOMContentLoaded', function () {
    index = 0;
    slides = document.querySelectorAll('.slider-figure');
    pagination = makePagination()

    for (let i = 1; i < slides.length; i++) {
        slides[i].classList.add('is-hidden');
    }

    let next = document.querySelector('.slider-nav a[rel="next"]');
    let prev = document.querySelector('.slider-nav a[rel="prev"]');
    document.addEventListener('keydown', keyboardControl)
    makeSlideShowButton()

    next.addEventListener('click', function(e) {
        e.preventDefault()
        onClickNext()
    });
    prev.addEventListener('click', function (e) {
        e.preventDefault()
        onClickPrev()
    });
})