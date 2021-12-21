'use strict';

/******************************************************************/
/* ************************* DONNEES **************************** */
/******************************************************************/

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

window.onload = createDataListFromGroup(group)

function createDataListFromGroup(group) {
    let container = document.getElementById('camarade')
    let dl = document.createElement('datalist')
    dl.id = 'liste'
    let index = 0
    for (const[key, value] of Object.entries(group)) {
        let option = document.createElement('option')
        option.value = group[index]['firstName']
        dl.appendChild(option)
        index++
    }
    container.appendChild(dl)
}