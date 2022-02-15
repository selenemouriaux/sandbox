'use strict'

/**
 * onClickNext()
 * écouteur d'évenement
 * permet d'avancer d'une slide
 */
function onClickNext() {

    index++;

    if (index == slides.length) {
        index = 0;
    }

    changeSlide();
}

/**
 * onClickPrev()
 * écouteur d'évenement
 * permet de reculer d'un slide
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
 * permet de faire afficher bonne slide
 */
function changeSlide() {
    //ajouter classe is-hidden à figure affichée
    document.querySelector('.slider-figure:not(.is-hidden)').classList.add('is-hidden');
    //supp class is-hidden à figure cachée
    slides[index].classList.remove('is-hidden');
    event.preventDefault();
}

//stocker l'index de la figure visible (au départ : 0)
let index = 0;

//récupérer un tableau des figures
let slides = document.querySelectorAll('.slider-figure');
//console.log(slides);

 for (let i = 1; i < slides.length; i++) {
    slides[i].classList.add("is-hidden");
}

//installer un gestionnaire d'évenements sur chaque lien
let next = document.querySelector('.slider-nav [rel="next"]');
next.addEventListener("click", onClickNext);

let prev = document.querySelector('.slider-nav [rel="prev"]');
prev.addEventListener("click", onClickPrev);


// bilbiothèque de slides pour choisir la slide qu'on veut voir en grand (petits ronds sur slider)
//
// let olSlide = document.createElement("ol");
// for (let i = 0; i < slides.length; i++) {
//     let liSlide = document.createElement("li");
//     olSlide.append(liSlide);
// };
//
// let slider = document.querySelector('.slider');
// slider.append(olSlide);