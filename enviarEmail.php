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