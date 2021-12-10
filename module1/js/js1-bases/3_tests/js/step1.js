'use strict';

let diviseur = 8;
let nombre;
let bool = false;

// opérateur ternaire

//            -        -
// (condition)? ifTrue : ifFalse
//            -        -

bool? alert("true") : alert('false')

for (let i = 0; i < 3; i++) {
    if (!confirm(`Voulez vous diviser par ${diviseur} ? `)) {
        diviseur = parseInt(window.prompt(`Définissez un autre diviseur pour remplacer ${diviseur} : `));
    }
    do {
        nombre = parseInt(window.prompt(`Donnez un nombre à diviser par ${diviseur} : `));
        if (isNaN(nombre)) {
            alert('CECI N\'EST PAS UN NOMBRE !')
        }
    } while (isNaN(nombre));

    if (nombre % diviseur) {
        document.write(`<br><span class='is-not-ok'>${nombre} n'est pas divisible par ${diviseur}</span> : ${nombre}/${diviseur} = ${parseInt(nombre/diviseur)} et reste ${nombre%diviseur}`)
    } else {
        document.write(`<br><span class='is-ok'>${nombre} est bien divisible par ${diviseur}</span> : ${nombre}/${diviseur} = ${nombre/diviseur}`)
    }
    document.write('<hr>')
}