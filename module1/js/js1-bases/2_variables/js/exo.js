'use strict';

let tauxTva = 0.2;
let montantHt;
let montantTva;
let montantTtc;

montantHt = parseFloat(window.prompt('Quelle est la valeur hors taxe dont vous voulez connaître la TVA et le montant TTC ? ')).toFixed(2);
// alert(montantHt);
if (!confirm(`La tva est réglée à : ${tauxTva * 100}%, est ce correct ?`)) {
    tauxTva = prompt('Veuillez redéfinir la TVA en pourcentage :') / 100;
}
montantTva = (montantHt * tauxTva).toFixed(2)
console.log(`type of montant TVA : ${typeof(montantTva)}, montant TVA = ${montantTva}`)
console.log(`type of montant HT : ${typeof(montantHt)}, montant HT = ${montantHt}`)
montantTtc = Number(montantTva) + Number(montantHt)

console.log(`Pour un montant HT de : ${montantHt} €
le montant de la TVA est de : ${montantTva} €
le montant TTC est de : ${montantTtc} €
`);

document.write(`<hr><h2><p>Pour un montant HT de : ${montantHt} €</p>
<p>le montant de la TVA est de : ${montantTva} €</p>
<p>le montant TTC est de : ${montantTtc} €</p></h2>
`);