'use strict';

/**
 * SLIDER - GRETAWEB Groupe 8
 *  
 *  1 - Récupérer une collection des éléments à faire défiler (dans une variable slides) dans un tableau 
 *  2 - Cacher chaque figure sauf la première à l'aide d'une classe is-hidden (display : none)
 *  3 - Stocker l'index correspondant à la première slide (index = 0) : : les fonctions permettant de faire défiler le slider modifient cette valeur
 *  4 - Installer un gestionnaire d'événements sur les liens de navigation (prev, next) permettant au click d'éxécuter les fonctions :
 *      onClickNext() : index++
 *      onClickPrev() : index--
 *      
 *      Le slider est circulaire : si l'index ne correspond pas à un indice existant, il sera redéfini afin de repartir du début (si on avance) ou de la fin (si on recule)  
 * 
 *  5 - Les fonctions respectives doivent exécuter une fonction changeSlide() permettant de rendre visible le slide correspondant au nouvel index et de cacher le slide précédent 
 *      -> masquer le slide précédent -> ajouter la classe is-hidden à celui ne l'ayant pas
 *      -> rendre visible le slide correpondant à l'index en cours  -> supprimer la classe is-hidden 
 *     
 * Remarque : une collection d'éléments doit être parcourue à l'aide d'une boucle 
 */



 
 
 // Stocker l'index de la figure visible (au départ , -> 0 ) 
 
 let index = 0;
 
  /*
  * onClickNext()
  * Ecouteur d'évenement 
  * Permet d'avancer d'1 slide
 */
 function onClickNext() {
     console.log(this);
     index++;
     if (index === slides.length) {
         index = 0;
     }
 
     changeSlide();
 }
 
 
 /*
  * onClickPrev()
  * Ecouteur d'évenement
  * Permet de reculer d'1 slide
 */
 function onClickPrev() {
     console.log(this); 
 
 
     index--;
     if (index < 0){
         index = slides.length -1;
     }
 
 
     changeSlide();
 }
 
 /**
  * changeSlide()
  * Permet de faire bonne figure
 */
 function changeSlide() {
     document.querySelector('.slider-figure:not(.is-hidden)').classList.add('is-hidden');
     slides[index].classList.remove('is-hidden');
 }
 
 
 
 
 
 // Récupérer un tableau des figures 
 let slides;
 slides = document.querySelectorAll('.slider-figure');
 
 
for (let i = 1; i<slides.length; i++){
    slides[i].classList.add('is-hidden');

}

    
// Installer un gestionnaire d'évènement sur chaque lien 
let next = document.querySelector('.slider-nav a[rel="next"]');
let prev = document.querySelector('.slider-nav a[rel="prev"]');

next.addEventListener('click', onClickNext); 

prev.addEventListener('click', onClickPrev); 

/** INSER UNE PAGINATION
 * 
 * Inserer une liste numeroté via le script en dynamique
 * la liste sera insérée a la suite des éléments du slider (apres la naviagation)
 * la ol aura une classe : slider pagination 
 * chaque Li doit correspondre à une slide
 * que li a une classe slider-pagination-item
 * chaque li aura un attribut data-id
 * stockant la valeur de l'index correspondant à la slide
 */


//Creation de la fonction des boutons de paginations
function onClickPagination(){
    // this correspond à l'élément déclenché (li cliqué dans ce cas)
    let dataSlide = this.dataset.id;
    dataSlide --;
    index = dataSlide;
    changeSlide();
}

// Créer une pagination 
let ol; 
ol = document.createElement('ol');
ol.classList.add('slider-pagination');
for(let i=0; i < slides.length; i++){
    let li;
    li = document.createElement('li');
    li.classList.add('slider-pagination-item');
    li.setAttribute('data-id', index);
    ol.append(li);

// Créer un gestionnaire d'évenement dans les li
    li.addEventListener('click', onClickPagination);

}
document.querySelector('.slider').append(ol);
