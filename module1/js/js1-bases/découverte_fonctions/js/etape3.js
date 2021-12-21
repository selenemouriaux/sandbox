"use strict";

let form = document.getElementById('dates')

function getDateByStr(form) {
    let splitSymbol = new RegExp(/[/\-\\ ]/gm)
    let camarade = form.liste.value
    let str = []
    form.str.value ? str.push({'type': 'date pourrave', 'date': form.str.value}) : ''
    let format = form.format.value
    let date
    if (camarade) {
        for (let person of group)
            person['firstName'] === camarade ?
                str.push({'type': person['firstName'], 'date': person['birthday']}) : ''
    }
    let options = {weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'}
    let p3 = document.getElementById('etape3')
    p3.innerHTML = "en objet date time et arrangé en format Français, votre saisie devient : "
    let dt = new Date()
    for (let entry in str) {
        date = str[entry]['date'].split(splitSymbol)
        if (str[entry]['type'] === 'date pourrave' && format === "mmjjaaaa") {
            dt.setFullYear(date[2], date[0]-1, date[1])
            console.log('mmjjaaaa', dt)
        } else if (str[entry]['type'] === 'date pourrave' && format === "aaaammjj") {
            dt.setFullYear(date[0], date[1]-1, date[2])
            console.log('aaaammjj', dt)
        } else if (str[entry]['type'] === 'date pourrave' && format === "aaaajjmm") {
            dt.setFullYear(date[0], date[2]-1, date[1])
            console.log('aaaajjmm', dt)
        } else {
            dt.setFullYear(date[2], date[1]-1, date[0])
            console.log('jjmmaaaa', dt)
        }
        console.log(new Intl.DateTimeFormat('fr-FR', options).format(dt))
        p3.innerHTML += `<br>${str[entry]['type']} : ${new Intl.DateTimeFormat('fr-FR', options).format(dt)}`
    }
    return false
}

const group = [
    {
        firstName: 'Marianne',
        birthday: '24/02/1992'
    },
    {
        firstName: 'Mohammed',
        birthday: '07/08/1983'
    },
    {
        firstName: 'Gabin',
        birthday: '16/05/2001'
    },
    {
        firstName: 'Kamel',
        birthday: '12/12/1986'
    },
    {
        firstName: 'Julien',
        birthday: '27/01/1992'
    },
    {
        firstName: 'Vincent',
        birthday: '10/01/1990'
    },
    {
        firstName: 'Alice',
        birthday: '10/04/1995'
    },
    {
        firstName: 'Aurélien',
        birthday: '23/12/1988'
    },
    {
        firstName: 'Sélène',
        birthday: '08/06/1981'
    },
    {
        firstName: 'Véronique',
        birthday: '23/10/1962'
    }
]