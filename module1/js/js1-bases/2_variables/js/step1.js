const firstName = 'Dobby';
console.log(firstName);

var xvar = 'xvar';
var yvar;

let zlet = 20;

console.log('je suis '+xvar);
console.log('zlet : '+zlet);
zlet = 11;
console.log('zlet : '+zlet)

/**
 * différence let / var :
 * let a une portée de bloc
 * var a une portée globale sauf si elle est déclarée dans une fonction
 * var a une faculté de hosting (remontée de variable)
 */

{
    let zlet = 7;
    console.log('zlet modifié à 7 dans ce bloc : '+zlet);
}

{
    let xvar = 7;
    console.log('xvar modifié à 7 dans ce bloc : '+xvar);
}

console.log('xvar en dehors du bloc : '+xvar);

avar = ' un truc';
console.log(avar);

console.log(typeof firstName);

