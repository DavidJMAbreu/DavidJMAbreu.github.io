<!-- PHP Enviar Email -->
<?php

  require 'PHPMailerAutoload.php';

if(!isset($_POST['submit']))
{
  echo "Erro! Tem de submeter o formulário";
}

$nome = $_POST['nome'];
$emailFonte = $_POST['email'];
$mensagem = $_POST['mensagem'];

$emailFrom = ;
$emailSubject = "Email Assunto";
$emailCorpo = "Nome : $nome.\n E-mail: $emailFonte\n\n$mensagem";

$para = "davidjma1999@gmail.com";
$cabecalho = "De: $emailFrom\r\n";
$cabecalho .= "Responder a: $emailFonte\r\n";

mail($para,$emailSubject,$emailCorp,$emailCabecalho);
header("Location: index.html");


?> 
<!-- PHP Enviar Email -->