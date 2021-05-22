<?php 

 require "./bibliotecas/PHPMailer/Exception.php";
 require "./bibliotecas/PHPMailer/OAuth.php";
 require "./bibliotecas/PHPMailer/PHPMailer.php";
 require "./bibliotecas/PHPMailer/POP3.php";
 require "./bibliotecas/PHPMailer/SMTP.php";

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

#print_r($_POST);
 class Mensagem{

private $para = null;
private $assunto = null;
private $mensagem = null;
public $status = array('codigo_status' => null, 'descricao_status' => '');


public function __get($atributo){
    return $this->$atributo;
}

public function __set($atributo, $valor){
$this->$atributo = $valor;
}

public function mensagemValida(){
if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
    return false;
}

return true;

    }
 }

 $mensagem = new Mensagem();

 $mensagem->__set('para', $_POST['para']);
 $mensagem->__set('assunto', $_POST['assunto']);
 $mensagem->__set('mensagem', $_POST['mensagem']);

 //print_r($mensagem);

 if(!$mensagem->mensagemValida()) {
     echo 'A mensagem é inválida';
     header('location:index.php');
     die();
 } 
 $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailit.bot1.0@gmail.com';                     //SMTP username
    $mail->Password   = '0114$#abc';                               //SMTP password
    $mail->SMTPSecure = 'tls';     //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('mailit.bot1.0@gmail.com', 'Mail it remetente');
    $mail->addAddress($mensagem->__get('para'));     //Add a recipient
    #$mail->addReplyTo('info@example.com', 'Information');
   # $mail->addCC('cc@example.com');
    #$mail->addBCC('bcc@example.com');

    //Attachments
    #$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = 'Oi eu sou o conteúdo do <b>e-mail</b>';
    $mail->AltBody = 'É necessário utilizar um client que suporta HTML para ter acesso total ao conteúdo dessa mensagem!';

    $mail->send();
   # echo 'Message has been sent';

   $mensagem->status['codigo_status'] = 1;
   $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso!';

} catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar esse e-mail! Porfavor tente novamente mais tarde.<br/> Detalhes do erro: ' . $mail->ErrorInfo;
}
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Mail it! ;) - The Next level mailing experience</title>
  </head>
  <style>
  body {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
    display:flex;
      align-items:center;
      justify-content:center;
      flex-direction:row;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
    h1,h4{
    text-align:center;
  }
  h1{
      font-size:64px;
    background: -webkit-linear-gradient(#FF1493, #00BFFF);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  }
  h4{
      color:darkgray;
      padding-bottom:30px;
  }
  h2{
      color:green;
  }
  #logo{
      width:220px;
      height:190px;
      margin-left:462px
  }
  #btn{
      color:white;
      background:green;
      border-radius:10px;
      margin-bottom:40px;
  }
.container{
    background-color:white;
}
.container1{
    width:1100px;
    height:640px;
      margin-top:50px;
      background-color:white;
      padding-top:20px;
      border-radius:35px;
      padding-bottom:30px;
  }
 </style>
  <body>
  <div class="container1">
    <img id="logo"src="img/mail.png">
    <h1>Mail It</h1>
    <h4 id="gray">Obrigado pela preferência!</h4>
    <div class="row">
        <div class="col-md-12">
        <? if($mensagem->status['codigo_status'] == 1){?>
            <div class="container">
            <h2 class="display-4 text-sucess">Sucesso!</h2>
            <p><?= $mensagem->status['descricao_status']?></p>
            <a href="index.php" id="btn" class="btn btn-sucess btn-lg mt-5 text-white">Voltar</a>
            </div>
</div>
    <?}?>
    <? if($mensagem->status['codigo_status'] == 2){?>
        <div class="container">
            <h2 class="display-4 text-danger">Ops! Algo deu errado...</h2>
            <p><?= $mensagem->status['descricao_status']?></p>
            <a href="index.php" id="btn" class="btn btn-sucess btn-lg mt-5 text-white">Voltar</a>
            </div>
        
<?}?>
        </div>
    </div>

  </body>
</html>