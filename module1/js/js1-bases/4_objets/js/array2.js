'use strict'

let myName = "Sélène"
let index
let arr = [
    {'firstName': 'Marianne', 'birthYear': 1992, 'children': ['pier', 'pol', 'jak'], 'single': false},
    {'firstName': 'Mohammed', 'birthYear': 1983},
    {'firstName': 'Gabin', 'birthYear': 2001},
    {'firstName': 'Kamel', 'birthYear': 1986},
    {'firstName': 'Vincent', 'birthYear': 1990},
    {'firstName': 'Julien', 'birthYear': 1992},
    {'firstName': 'Aurélien', 'birthYear': 1988},
    {'firstName': 'Alice', 'birthYear': 1995},
    {'firstName': 'Sélène', 'birthYear': 1981}
]

document.write('<ul>')
for (let person of arr) {
    document.write(`<li>${person.firstName}<ul>`)
    for (let elem in person) {
        elem !== 'firstName' ? document.write(`<li>${elem} : ${person[elem]} `) : ''
        // for
        document.write('</li>')
    }
    document.write('</ul></li>')
}
document.write('</ul>')