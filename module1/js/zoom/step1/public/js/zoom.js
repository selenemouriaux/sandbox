/**
 * Module zoom
 * v 1.0
 */

'use strict';

// ====================================================== //
// ================= VARIABLES GLOBALES ================= //
// ====================================================== //

let zoom;
let zoomFrame;

// ====================================================== //
// ====================== FONCTIONS ===================== //
// ====================================================== //

/**
 * OnclickThumbnail
 * Chargement de la version agrandie
 */
function OnclickThumbnail(img) {
  // console.log(img)
  console.log(document.querySelector('.zoom-thumbnail.is-active'))
  document.querySelector('.zoom-thumbnail.is-active').classList.remove("is-active");
  document.querySelector(img.dataset.gallery_id).classList.remove("animate__zoomIn");
  document.querySelector(img.dataset.gallery_id).classList.add("animate__zoomOut");
  setTimeout(() => {
    document.querySelector(img.dataset.gallery_id+' img').src = img.src;
    img.classList.add("is-active");
    document.querySelector(img.dataset.gallery_id).classList.remove("animate__zoomOut");
    document.querySelector(img.dataset.gallery_id).classList.add("animate__zoomIn");

  }, 350);
}

// ====================================================== //
// ======== CODE ÉXÉCUTÉ AU CHARGEMENT DE LA PAGE ======= //
// ====================================================== //

document.addEventListener('click', (e) => {
  if (!e.target.classList.contains("zoom-thumbnail")) {
    return;
  }
    OnclickThumbnail(e.target)
})
