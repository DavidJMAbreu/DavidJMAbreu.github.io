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

$emailDestino = "davidjma1999@gmail.com";
$assunto = "E-mail website: \t $nome";

$cabecalho = "Content-type: text/html;\r\n";
$cabecalho .= "De: $email";

mail($emailDestino,$assunto,$mensagem,$cabecalho);
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