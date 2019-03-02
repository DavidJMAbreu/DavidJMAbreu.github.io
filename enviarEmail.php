<!-- PHP Enviar Email -->
<?php

  require 'PHPMailerAutoload.php';

if(!isset($_POST['submit']))
{
  echo "Erro! Tem de submeter o formulário";
}

$result="";
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

$mail = new PHPMailer(true);
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Username='davidjma1999@gmail.com';
$mail->Password='73255237';

$mail->setFrom(email, nome);
$mail->addAddress('davidjma1999@gmail.com');
$mail->addReplyto(email, nome);
$mail->isHTML(true);
$mail->Subject='Mensagem do website';
$mail->Body='<h1> Name:'.nome.'<br>Email:'.email.'<br>Message: '. mensagem.'</h1>';

if(!$mail->send()){
  $result="O e-mail não pode ser enviado!";
}else{
  $result="O e-mail foi enviado com sucesso";
}

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