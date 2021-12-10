'use strict';
/* 
let response = prompt('tiens saisis moi qqch negro : ')
confirm(`c\'est ça ton qqch : "${response}" ?!?..`)
 */

let firstName;
let confirm;

firstName = window.prompt('ton prénom :');
confirm = window.confirm(`tout va bien ${firstName.charAt(0).toUpperCase()}${firstName.slice(1).toLowerCase()} ?`);

console.log(
    `type de firstName : ${typeof(firstName)},
type de confirm : ${typeof(confirm)}`);
