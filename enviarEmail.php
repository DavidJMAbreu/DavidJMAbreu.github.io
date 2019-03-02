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