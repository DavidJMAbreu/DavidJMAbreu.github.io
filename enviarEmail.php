<!-- PHP Enviar Email -->
<?php

  use PHPMailer\PHPMailer;
  use PHPMailer\Exception;
  require "PHPMailer\Exception.php";
  require "PHPMAILER\PHPMailer.php";
  require "PHPMailer\SMTP.php";

  require "autoload.php";

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

$mail = new PHPMailer(TRUE);
try{
  $mail->setFrom($emailFonte, $nome);
  $mail->addAddress("davidjma1999@gmail.com", "David Abreu");
  $mail->Subject = "Contacto Website";
  $mail->Body = $mensagem;
  $mail->send();
}
catch(Exception $e)
{
  echo $e->errorMessage();  
}
catch(\Exception $e)
{
  echo $e->errorMessage();  
}

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