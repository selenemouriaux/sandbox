'use strict';

function ajaxGet(url, callback) {
  const XHRObject = new XMLHttpRequest()
  XHRObject.open('GET', url, true)
  XHRObject.addEventListener('load', function () {
    try{
      if (XHRObject.status>=200 &&XHRObject.status < 400) {
        console.log(XHRObject.response)
        callback(XHRObject.responseText)
      } else {
        console.log(XHRObject.status) // logs the raw status code
        console.log(XHRObject.statusText) // logs the status error description
      }
    } catch (error) {
      console.log('Une exception s\'est produite : '+error.description)
    }
  })
  XHRObject.send(null)
}