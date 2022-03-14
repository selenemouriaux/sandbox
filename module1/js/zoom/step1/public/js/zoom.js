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
    // let split = zoom[e.dataset.frameNumber]['src'].split('medias/')[1];
    // console.log(e['src'])
    document.querySelector('.zoom-thumbnail.is-active').classList.remove("is-active");
    zoomFrame[e.dataset.frameNumber].classList.remove("animate__zoomIn");
    zoomFrame[e.dataset.frameNumber].classList.add("animate__zoomOut");
    console.log(zoom)
    setTimeout(() => {
        zoom[e.dataset.frameNumber]['src'] = e['src'];
        e.classList.add("is-active");
        zoomFrame[e.dataset.frameNumber].classList.remove("animate__zoomOut");
        zoomFrame[e.dataset.frameNumber].classList.add("animate__zoomIn");
    }, 350);
}

// ====================================================== //
// ======== CODE ÉXÉCUTÉ AU CHARGEMENT DE LA PAGE ======= //
// ====================================================== //

document.addEventListener('DOMContentLoaded', function () {
    zoom = document.querySelectorAll('.zoom-picture');
    zoomFrame = document.querySelectorAll('.zoom-figure');
    images = document.querySelectorAll('.zoom-thumbnail');
    console.log(images);
    images.forEach(function (image) {
        image.addEventListener('click', function (e) {
            if (image['src'].includes('galery1')) {
                console.log("ca marche, frame 1")
                image.dataset.frameNumber = 0;
            } else {
                console.log("ca marche, frame 2")
                image.dataset.frameNumber = 1;
            }
            console.log(image)
            OnclickThumbnail(e.currentTarget);
        });
    })

})
