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
  .form-control{
      width: 500px;
      
  }
  .mb-3{
      margin-left:308px;
      
  }
  .container{
    width:1100px;
    height:740px;
      margin-top:50px;
      background-color:white;
      padding-top:20px;
      border-radius:35px;
      margin-bottom:50px;
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
  #logo{
      width:220px;
      height:190px;
      margin-left:442px
  }
  #btn{margin-left:458px;
  padding-bottom:-50px;
  width:144px}
  </style>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <div class="container">
    <img id="logo"src="img/mail.png">
    <h1>Mail It</h1>
    <h4 id="gray">Simples, rápido e eficiente!</h4>
    <form action="processa_envio.php" method="POST">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="para" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Assunto</label>
  <input type="text" name="assunto" class="form-control" id="formGroupExampleInput" placeholder="Assunto...">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
  <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3" placeholder="Digite uma mensagem..."></textarea>
</div>
<input class="btn btn-primary" id="btn" type="submit" value="Enviar Mensagem">
</div>
 </form>
  </body>
</html>