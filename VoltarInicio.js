window.onscroll = function(){scroll()};

//Botão fixo para voltar ao inicio
var botao = document.getElementById("botaoVoltar");

function scroll(){
	if(document.body.scrollTop>20 || document.documentElement.scrollTop>20){
		botao.style.display = "block";
	}else{
		botao.style.display = "none";
	}
}

function voltarInicio(){
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}