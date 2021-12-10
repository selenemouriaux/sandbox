'use strict';
// let rng, playerChoice, keepOnPlaying, message
// let stats = {'won': 0, 'lost': 0}
// const ROCK = 1, PAPER = 2, SCISSORS = 0
//
// do {
//     playerChoice = parseInt(window.prompt(
// `Faites votre choix :
//   1 - Pierre
//   2 - Feuille
//   3 - Ciseaux
// NB: un nombre au dela sera basé
//  sur le reste de la division par trois`)) % 3
//     rng = parseInt(Math.random() * 3)
//     playerChoice === rng ?
//         message = 'Égalité !'
//         :
//         playerChoice === ROCK && rng === SCISSORS
//         || playerChoice === PAPER && rng === ROCK
//         || playerChoice === SCISSORS && rng === PAPER ?
//             (stats.won += 1, message = `${played(playerChoice)} gagne contre ${played(rng)}, vous remportez la manche !`)
//             :(stats.lost += 1, message = `${played(playerChoice)} perd contre ${played(rng)}, Skynet remporte la manche :(`)
//     alert(message)
//     keepOnPlaying = confirm('Rejouer ?')
// }while (keepOnPlaying)
//
// alert(`Vous avez gagné ${stats.won} manches contre skynet qui en a gagné ${stats.lost}`)
//
// function played(x) {
//     switch (x) {
//         case ROCK:
//             return "pierre";
//         case PAPER:
//             return "feuille";
//         case SCISSORS:
//             return "ciseaux";
//         default:
//             break
//     }
// }

let number1, number2, operator, result
const operatorsRegex = new RegExp('^[+*\/-]$')

do {
    number1 = parseInt(window.prompt('Entrez le premier nombre : '))
} while (isNaN(number1))
do {
    number2 = parseInt(window.prompt('Entrez le deuxième nombre : '))
} while (isNaN(number2))
do {
    operator = window.prompt("Entrez l'opération ( +, -, * ou / ) : ")
} while (!operatorsRegex.test(operator))

switch (operator) {
    case '+' :
        console.log('type of n1 : ' + typeof(number1) + ', n2 : ' + typeof(number2))
        result = number1 + number2
        break
    case '-' :
        result = number1 - number2
        break
    case '*' :
        result = number1 * number2
        break
    case '/' :
        if (number2 === 0) {
            alert("Nous ne savons pas encore diviser par zéro :/")
            break
        } else {
            result = number1 / number2
        }
    default:
        break
}

alert(`Le résultat de ${number1} ${operator} ${number2} est égal à ${result}.`)