'use strict';

let birthYear = parseInt(window.prompt('En quelle année êtes vous né(e) ?'));
let generation;
let bissextile;
let message;

1965 <= birthYear && birthYear <= 1984 ? generation = 'X' :
    1984 <= birthYear && birthYear <= 1996 ? generation = 'Y' :
        1997 <= birthYear && birthYear <= 2010 ? generation = 'Z' :
            2011 <= birthYear && birthYear <= 2025 ? generation = 'Alpha' :
                generation = 'des Baby-boomers';

(!(birthYear % 4) && (birthYear % 100)) || !(birthYear % 400) ?
    bissextile = 'était' : bissextile = 'n\'était pas';

message = `Vous faites partie de la génération ${generation}.
${birthYear} ${bissextile} une année bissextile.`;

alert(message);

let holidays = true;
let age = parseInt(window.prompt('Veuillez saisir votre âge : '));
let message

age >= 18 && holidays ? message = "Ok tu peux sortir" : message = "Continue de rêver"

alert(message)

let ingredients = {
    "Tomates": {'available': true, recipe: 'Pâtes en sauce'},
    'Oeufs': {'available': true, recipe: 'Omelette'},
    'Patates': {'available': true, recipe: 'Frites'},
    'Fromage': {'available': true, recipe: 'Fondue'}
}
let suggestions = []
let msg = "Au vu de tes provisions, je peux te proposer de cuisiner : "
// console.log(Object.keys(ingredients).length)
alert('J\'ai des recettes pour qq aliments, voyons voir ce que je peux te proposer !')
for (const [key, value] of Object.entries(ingredients)) {
    confirm(`As tu par hasard un/des ${key.toLowerCase()}`) ?
        (value.available = true, suggestions.push(value.recipe))
        : value.available = false
    // console.log(`${key}: ${value.recipe}`)
}
suggestions.forEach(suggestion =>
    msg += suggestion + ', '
)
!suggestions.length ?
    msg = "Go commander un Uber-Eat ou meurs de faim !  ":'';

alert(msg.slice(0, -2))

