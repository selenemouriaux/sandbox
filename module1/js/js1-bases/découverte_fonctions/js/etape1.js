'use strict'

// let form = document.querySelector("form")
let cercle = document.getElementById("jeSapelCercle")


/**
 * Draws a circle using a span, setup with params injected through an html form.
 * @param form takes the form as params, then extracts its inputs diameter and color
 */
function showCircleCss(form) {
    let diameter = form.diameter.value
    let color = form.color.value
    if (!diameter) {
        console.log(diameter, color)
        return false
    }
    cercle.style.height = `${diameter}px`
    cercle.style.width = `${diameter}px`
    cercle.style.backgroundColor = `${color}`
    cercle.style.display = "inline-block"
    cercle.style.borderRadius = "50%"
    return false
}
