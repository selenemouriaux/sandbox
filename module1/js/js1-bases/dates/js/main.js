'use strict'

// let now, genesis;
// now = new Date
// genesis = new Date(0)

// un timestamp est le nombre de millisecondes
// depuis la génèse informatique, soit : 1/1/1970

// TimeStamp peut donc être un exprimé en entier par calcul :
//     (1981-1970)*365*24*3600*1000
//     delta d'années * 365 jours * 24h * 3600 secondes * 1000 millisecondes

// les méthodes de Date sont :
//     - .getFullYear()
//     - .getMonth()
//     - .getDate()
//     - .getDay()
//     - .getHours()
//     - .getMinutes()
//     - .getSeconds()
//     - .getMilliseconds()
//     - .getTimezoneOffset()

// AutoCorrect :
// new Date(1981,6,8,18,59) retourne un DT correct

// console.log(`now : ${now}
// genesisDate : ${genesis}
// TS de mtn: ${Date.now()}`)
//
// let myBirthday
// myBirthday = new Date('1981-06-08')
// console.log("je suis née le "+myBirthday)

let today = new Date
let time = new Date(Date.now())
let myText
let AffichageDuJour = {weekday: 'long'}
let AffichageDuMois = {month: 'long'}
myText = document.getElementById('myText')
myText.innerHTML = `${new Intl.DateTimeFormat('fr-EU', AffichageDuJour).format(today)} ${today.getDate()} ${new Intl.DateTimeFormat('fr-EU', AffichageDuMois).format(today)}, il est ${time.getHours()}h${time.getMinutes().toLocaleString(
        'fr-EU', {minimumIntegerDigits: 2, useGrouping:false})}m${time.getSeconds().toLocaleString('fr-EU', {minimumIntegerDigits: 2, useGrouping:false})}`

// on ne peut pas faire un getHours sur un TimeStamp, il faut donc le convertir en DT avec : new Date(TimeStamp)
// new Intl.DateTimeFormat('fr-EU', options).format(DT)
// options est un objet qui comprend les infos que je veux afficher, dont possiblement :

