<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/css/styleLogin.css">
  <title>Login</title>
</head>

<body>
  <div class="container">

    <div class="container-login">
      <div class="wrap-login">
        <h1>Equipe <span>Clin</span>Ware</h1>
        <br></br>
        <ul>
          <li> Pedro Fenômeno -
            O 9 matador.
          <li> Gustavo De Bronha -
            Armador e faixa.
          <li> Derisemiro -
            Pitbull do meio campo
          <li> Ainda para ser contrato. - Vem para pegar a 10
        </ul>


        <form action="GET" className="login-form">


          <span class="login-form-title">
            <img src="src/img/logo-clinware.png" alt="logo da Clinware"></img>
          </span>

          <div class="wrap-input">

            <input>
            <span class="focus-input" data-placeholder="Nome">
            </span>
          </div>



          <div class="wrap-input">
            <input><span class="focus-input" data-placeholder="Password">
            </span>
          </div>

          <button class="login-form-btn">
            Login
          </button>

          <div class="text-center">
            <span class="txt1">Não possui conta ainda?</span>

            <a class="txt2" href="#">Criar uma conta</a>

          </div>


        </form>
      </div>
    </div>
  </div>
</body>

</html>