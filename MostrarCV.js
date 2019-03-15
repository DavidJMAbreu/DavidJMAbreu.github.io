function toggleCVOR(){
	var CVDiv_OR = document.getElementById("CV_OR_BCK");
	if(CVDiv_OR.style.display === "none"){
		mostrar(CVDiv_OR);
	}else{
		esconder(CVDiv_OR);
	}
}

function toggleCVEP(){
	var CVDiv_EP = document.getElementById("CV_EP_BCK");
	if(CVDiv_EP.style.display === "none"){
		mostrar(CVDiv_EP);
	}else{
		esconder(CVDiv_EP);
	}
}

function mostrar(elemento){
	elemento.style.display = "block";
}

function esconder(elemento){
	elemento.style.display = "none";
}
