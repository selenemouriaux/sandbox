'use strict'

let group8, me

group8 = ['Marianne', 'Mohammed', 'Gabin', 'Kamel', 'Vincent', 'Julien', 'Aurélien', 'Alice', 'Sélène', 'Véronique']
console.log(group8)

me = group8[8]
console.log(me)

console.log('Index d\'alice : ' + group8.indexOf('Alice'))

// rajouter une valeur à la fin d'un array
group8.push('Emmanuel')
console.log(`J'ajoute Emmanuel avec .push(emmanuel)
${group8}`)

// rajouter un élément au début d'un array
group8.unshift('Tartanpion')
console.log(`je rajoute tartanpion au début avec .unshift(tartanpion)
${group8}`)

//supprimer le premier élément d'un array
group8.shift()
console.log(`je supprime le premier avec .shift()
${group8}`)

//supprimer x entrées à la y position
group8.unshift('Tartanpion')
console.log(`Je remets Tartanpion au début et je vais le supprimer avec
group8.splice(x,y) avec :
   x = premier élément du tableau,
   y = le nombre d'éléments à supprimer
avant splice : ${group8}
splice : "${group8.splice(group8.indexOf('Tartanpion'),1)}" est supprimé, c'est le return du splice
groupe8 après splice : ${group8} avec x = group8.indexOf('Tartanpion')`)

document.write("début de l'ol<ol>")
for (let i=0; i < group8.length; i++) {
    document.write(`<li>${group8[i]}</li>`)
}
document.write("</ol> fin de l'ol<br><strong>tous les document.write() doivent comporter des \"\" ou des ''<br>" +
    "sans quoi les balises et les textes provoqueront des erreurs ou des balises html non traitées !</strong>")

//.includes('') = python.contains()

