/**
 * Module zoom
 * v 1.0
 */

'use strict';

// ====================================================== //
// ================= VARIABLES GLOBALES ================= //
// ====================================================== //

let images;
let zoom;
let zoomFrame;

// ====================================================== //
// ====================== FONCTIONS ===================== //
// ====================================================== //

/**
 * OnclickThumbnail
 * Chargement de la version agrandie
 */
function OnclickThumbnail(e) {
    let split = zoom['src'].split('medias/')[1];
    document.querySelector('.zoom-thumbnail[src*="'+split+'"]').classList.remove("is-active");
    zoomFrame.classList.remove("animate__zoomIn");
    zoomFrame.classList.add("animate__zoomOut");
    setTimeout(() => {
        zoom['src'] = e['src'];
        e.classList.add("is-active");
        zoomFrame.classList.remove("animate__zoomOut");
        zoomFrame.classList.add("animate__zoomIn");
    }, 350);
}

// ====================================================== //
// ======== CODE ÉXÉCUTÉ AU CHARGEMENT DE LA PAGE ======= //
// ====================================================== //

document.addEventListener('DOMContentLoaded', function () {
    zoom = document.querySelector('.zoom-picture');
    zoomFrame = document.querySelector('.zoom-figure');
    images = document.querySelectorAll('.zoom-thumbnail');
    console.log(images);
    images.forEach(function (image) {
        image.addEventListener('click', function (e) {
            OnclickThumbnail(e.currentTarget);
        });
    })

})
