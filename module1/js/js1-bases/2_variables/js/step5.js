'use strict';

let firstName = 'Dobby';
let age = 88;
let nbChildren = '3';

// concat
document.write('<p>Bonjour Maître, ' + firstName + ' vous sert depuis ' + age + ' ans et vous a offert ' + nbChildren + ' mini péons en servitude éternelle.</p>')

// Caractère d'échappement : \

document.write('je m\'appelle '+'"'+firstName+'", '+ "j'ai : "+age + ' ans et '+nbChildren+' enfants<br>')
document.write('Age : '+ age + ' ' + nbChildren +' enfants<br>')

document.write('numerique : '+ (age + Number(nbChildren)))

console.log(age)
let nb = age++
console.log(nb)
console.log(age)

// les affections sont prioritaires sur les opérations : a=b++ != a=++b

/* 
Littéraux de gabarit
juste placer les variables comme en django à l\'intérieur :
 */
document.write(`<br>texte à concaténer : ${firstName}`);

console.log(
    `Je m'appelle ${firstName}
J'ai ${age} ans.`
);