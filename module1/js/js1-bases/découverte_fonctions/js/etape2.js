'use strict';
let p2 = document.getElementById("etape2")

/**
 * **Générateur de nombre aléatoire entre bornes comprises dans le random**
 * @author S_il_vanas
 * @inner le résultat est renvoyé sur le paragraphe #etape2
 * @param min borne inférieure ouverte.
 * @param max borne supérieure ouverte.
 * @default sans paramètres, la fonction donnera un nombre entre 10 & 20 bornes comprises.
 * @returns {boolean} renvoie systématiquement false pour empêcher le refresh de la page, le résultat est affiché via un innerText sur un élément html de l'index dans sa section exercice propre.
 */
function getRandomInteger(min, max) {
    p2.innerText=`Votre nombre random est : ${Math.floor(Math.random()*(max-min+1))+(max-min)}`
    return false
}