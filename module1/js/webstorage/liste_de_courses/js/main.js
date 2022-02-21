'use strict'

/************************************************************************
 **************** DECLARATION DES CONSTANTES ET GLOBALES ****************
 ************************************************************************/

const form = document.querySelector('#addItemForm')
const liste = document.querySelector('ol.MainContent-card-list')

/************************************************************************
 *********************** DEFINITION DES FONCTIONS ***********************
 ************************************************************************/

function getRemoteData() {
  let data = window.localStorage.getItem('fullList')
  if (!data) {
    return {}
  }
  return JSON.parse(data)
}

function saveData(data) {
  window.localStorage.setItem('fullList', JSON.stringify(data))
}

function updateOrCreateList() {
  let fullList = getRemoteData()
  if (form.produit.value !== '') {
    fullList[form.produit.value] = {
      qtte: form.qtte.value, conditionnement: form.conditionnement.value
    }
    saveData(fullList)
  }
  displayList()
}

function cleanHTML() {
  form.reset()
  let btn = document.querySelector('#clearList')
  liste.innerHTML === "" ?
    btn.style.display = "none"
    :
    btn.style.display = "initial"
  form.querySelector('button[type="submit"]').textContent = "Ajouter"
  form.style.backgroundColor = "white"
  form.produit.focus()
}

function displayList() {
  let fullList = getRemoteData()
  liste.innerHTML = ""
  for (let elem in fullList) {
    let del = document.createElement("button")
    del.innerHTML = '<i class="fas fa-trash">'
    del.dataset.id = elem
    del.addEventListener('click', deleteArticle)
    let mod = document.createElement("button")
    mod.dataset.id = elem
    mod.innerHTML = '<i class="fas fa-edit">'
    mod.addEventListener('click', modifyArticle)
    let li = document.createElement('li')
    li.innerHTML = '<span>' + elem + " : " + fullList[elem].qtte + " " + fullList[elem].conditionnement + ' ... </span>'
    li.append(del, mod)
    liste.appendChild(li)
  }
  cleanHTML()
}

function deleteArticle() {
  let fullList = getRemoteData()
  delete fullList[this.dataset.id]
  saveData(fullList)
  displayList()
}

function modifyArticle() {
  form.style.backgroundColor = "orange"
  let tmp = getRemoteData()[this.dataset.id]
  console.log(tmp)
  form.produit.value = this.dataset.id
  form.qtte.value = tmp.qtte
  form.conditionnement.value = tmp.conditionnement
  form.querySelector('button[type="submit"]').textContent = "Modifier"

}

/************************************************************************
 ***************** CODE EXECUTE AU LANCEMENT DE LA PAGE *****************
 ************************************************************************/

document.addEventListener('DOMContentLoaded', (e) => {
  form.addEventListener('submit', function (e) {
    // e.preventDefault();
    updateOrCreateList();
  })
  form.querySelector('button[type="reset"]').addEventListener('click', cleanHTML)
  document.querySelector('#clearList').addEventListener('click', (e) => {
    // e.preventDefault();
    window.confirm("Voulez vous vraiment supprimer toute la liste des courses ?") ?
      window.localStorage.removeItem('fullList') : ""
    displayList();
  })
  displayList();
})









