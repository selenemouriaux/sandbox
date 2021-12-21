'use strict'

let myName = "Sélène"
let index
let arr = [
    {
        'firstName': 'Marianne', 'birthYear': 1992,
        'children': ['pier', 'pol', 'jak'], 'single': false
    },
    {'firstName': 'Mohammed', 'birthYear': 1983},
    {'firstName': 'Gabin', 'birthYear': 2001},
    {'firstName': 'Kamel', 'birthYear': 1986},
    {'firstName': 'Vincent', 'birthYear': 1990},
    {'firstName': 'Julien', 'birthYear': 1992},
    {'firstName': 'Aurélien', 'birthYear': 1988},
    {'firstName': 'Alice', 'birthYear': 1995},
    {'firstName': 'Sélène', 'birthYear': 1981},
    {'firstName': 'Véronique', 'birthYear': 1962}
]
let generation = {
    boomers: 0,
    x: 0,
    y: 0,
    z: 0,
    alpha: 0
}

document.write('<dl>')
for (let person of arr) {
    document.write(`<dt>${person.firstName}</dt><ul>`)
    stats(person.birthYear)
    for (let elem in person) {
        elem !== 'firstName' ? document.write(`<dd>${elem} : ${
            !Array.isArray(person[elem]) ? person[elem] : ''} `) : ''
        if (Array.isArray(person[elem])) {
            document.write("<ul>")
            for (let e of person[elem]) {
                document.write(`<li>${e}</li>`)
            }
            document.write("</ul>")
        }
        document.write('</dd>')
    }
    document.write('</ul>')
}
document.write('</dl>')

// console.log(arr[0]['children'][2])

function stats(birthYear) {
    1965 <= birthYear && birthYear <= 1984 ? generation['x'] += 1 :
        1984 <= birthYear && birthYear <= 1996 ? generation['y'] += 1 :
            1997 <= birthYear && birthYear <= 2010 ? generation['z'] += 1 :
                2011 <= birthYear && birthYear <= 2025 ? generation['alpha'] += 1 :
                    generation['boomers'] += 1;
}

let highest = ['alpha']
let lowest = []
for (let gen in generation) {
    generation[gen] > generation[highest.slice(-1)] ? highest.push(gen) : ''
    for (let gen2 in generation) {
        if (generation[gen] > 0 && generation[gen] < generation[gen2]
            && !(generation[gen] > lowest[0] || generation[gen] > 1)) {
            lowest.push(gen)
            break;
        }
    }
}
while (highest.length>1 && highest[0]!==highest[1]) {highest.shift()}
console.log(generation, `
Highest : ${highest}
Lowest : ${lowest}
`)

document.write(`<br>La/les génération(s) la/les plus représentée(s) est/sont 
la/les génération(s) <strong>${highest.join(' et ')}</strong> avec 
${generation[highest[0]]} représentant(e,s), tandis que la/les génération(s) 
le moins repésentée(s) est/sont <strong>${lowest.join(' et ')}</strong> avec 
${generation[lowest[0]]} représentant(e,s).`)