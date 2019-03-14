// Get the modal
var modal_Or = document.getElementById('CV_Or-Modal');
var modal_EP = document.getElementById('CV_EP-Modal');

// Get the button that opens the modal
var btn_CVOr = document.getElementById("CV_Or");
var btn_CVEP = document.getElementById("CV_EP");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("fecharCV")[0];

// When the user clicks the button, open the modal 
btn_CVOr.onclick = function() {
  modal_Or.style.display = "block";
  window.alert("Funciona");
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal_Or.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_Or) {
    modal_Or.style.display = "none";
  }
}

btn_CVEP.onclick = function() {
  modal_EP.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal_EP.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_EP) {
    modal_EP.style.display = "none";
  }
}