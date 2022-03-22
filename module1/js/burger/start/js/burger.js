'use strict';

const btnBurger = document.querySelector('.button-burger');
const openNav = document.querySelector('#menu');

;(function () {
  // Bonus : Recharger la page si la fenêtre est redimensionnée
  window.onresize = function () {
    location.reload(true);
    displayCollapsed(window);
  }
  // 1 - Menu burger uniquement en dessous de 1024px (éviter un else)
  function displayCollapsed(box= window) {
    openNav.style.display = 'none';
    btnBurger.style.display = 'initial';
    if (box.innerWidth > 1023) {
      openNav.style.display = 'initial';
      btnBurger.style.display = 'none';
      return false;
    }
    return true;
  }

  displayCollapsed(this);

  function toggleNav() {
    openNav.classList.toggle('is-open');
    displayCollapsed(this) ? openNav.style.display = 'initial' : openNav.style.display = 'none';
  }

  // 6 - Chargement de la fonction toggleNav lorsque toutes les ressources sont chargées

  document.addEventListener('DOMContentLoaded', function () {

    // installation des listeners d'animation de hovering
    btnBurger.addEventListener('mouseenter', function () {
      this.classList.add('has-focus');
    })
    btnBurger.addEventListener('mouseleave', function () {
      this.classList.remove('has-focus');
    })

    // installation du listener d'appel de fonction
    btnBurger.addEventListener('click', toggleNav);
  })

})();
