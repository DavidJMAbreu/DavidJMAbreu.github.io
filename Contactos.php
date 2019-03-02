<!-- PHP Enviar Email -->
<?php
if(!isset($_POST['submit']))
{
	echo "Erro! Tem de submeter o formulário";
}

$nome = $_POST['nome'];
$emailFonte = $_POST['email'];
$mensagem = $_POST['mensagem'];
if(empty($nome)||empty($emailFonte)) 
{
    echo "nome e e-mail são obrigatórios";
    exit;
}

if(IsInjected($emailFonte))
{
    echo "E-mail inválido";
    exit;
}

$origemEmail = 'davidjma1999@gmail.com';//<== update the email address
$assuntoEmail = "Contacto Email por página";
$corpoEmail = "Tem um email de:\t $nome.\n".
    "\n\n\n $mensagem".
    
$destino = "davidjma1999@gmail.com";//<== update the email address
$cabecalho = "De: $origemEmail \r\n";
$cabecalho .= "Responder_A: $emailFonte \r\n";
mail($destino,$assuntoEmail,$corpoEmail,$cabecalho);
header('index.html');

function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 
<!-- PHP Enviar Email -->





<!DOCTYPE html>
<html>
<head>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="temasContactos.css">

	<!-- JS para validar formulário -->
	<script type="text/javascript" src="validarFormulario.js"></script>

	<!-- Bootstrap 4 css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- JQuery and JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Compatibilidade com os dispositivos -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contactos</title>
</head>
<body>

	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light" id="barraNavegacao">
			<div class="navbar-header" id="marcaNavegacao">
				<a href="index.html" class="navbar-brand d-none d-sm-block"><i class="fas fa-home" ></i></a>
				<a href="index.html" class="navbar-brand d-block d-sm-none"><i class="fas fa-home" ></i> &Iacutenicio</a>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav text-center" id="linksNavegacao">
					<li class="nav-item">
						<a class="nav-link d-none d-lg-block border-right border-left" href="CVitae.html" id="CV"><p>Curriculum</p> Vitae</a>
						<a class="nav-link d-lg-none border-bottom" href="CVitae.html" id="CV"><p>Curriculum</p> Vitae</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-lg-none border-bottom" href="Projetos.html">Projetos</a>
						<a class="nav-link d-none d-lg-block border-right border-left" href="Projetos.html">Projetos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-lg-none disabled" href="#" id="Contactos">Contactos</a>
						<a class="nav-link d-none d-lg-block border-right border-left disabled
						" href="#" id="Contactos">Contactos</a>
					</li>
				</ul>

			</div>
		</nav>

		<br>

		<div class="jumbotron">
			<div class="container" style="text-align: left">
				<form action="enviarEmail.php" method="post" class="needs-validation" novalidate>
					<div class="form-group" >
						<label for="email">E-mail:</label>
  				    	<input type="email" class="form-control" name="email" id="email" placeholder="Introduza o e-mail" required>		
  					</div>
  					<div class="form-group">
  						<label for="texto">Mensagem:</label>
  				   	 <textarea class="form-control" rows="8" id="mensagem" name="mensagem" required></textarea>		
  					</div>
  					<div class="form-group">
  						<input type="submit" name="submit" class="btn btn-dark">  				
  					</div>

  						
      					
			</form>
			</div>
		</div>

</body>
</html>



