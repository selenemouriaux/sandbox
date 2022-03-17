'use strict';

function ajaxPost(url, data, callback) {
  const XHRObject = new XMLHttpRequest()
  if (!XHRObject) {
    console.log("abandon")
    return false
  }
  XHRObject.open("POST", url)
  XHRObject.addEventListener('load', function () {

    if (XHRObject.status >= 200 && XHRObject.status < 400) {
      console.log(XHRObject.response)
      callback(XHRObject.responseText)
    } else {
      console.log("error: " + XHRObject.status + " (" + XHRObject.statusText + ")")
    }
  })
  XHRObject.send(null)
}