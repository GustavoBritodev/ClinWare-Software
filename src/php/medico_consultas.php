<?php

//  print_r($_REQUEST);
//  echo "Cheguei aqui!"

// if(isset($_POST['submit'])){

//     include_once('config.php'); 

//     $email = $_POST['email'];
//     $senha = $_POST['senha'];

//     $sql = "SELECT * FROM tb_usuario WHERE nm_login = '$email' and cd_senha ='$senha'";

//     $result = $conexao->query($sql);

//     print_r($result);

// } else {

//     header('Location: login.php');
    
// }
// session_start(); // Iniciar a sessão

// // Verificar se o usuário está autenticado
// if (!isset($_SESSION['email'])) {
//     // Se não estiver autenticado, redirecionar para a página de login
//     header("Location: login.php");
//     exit();
// }
session_start(); // Iniciar a sessão

// Verificar se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    // Se não estiver autenticado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./src/css/aside.css">
    <link rel="stylesheet" href="./src/css/medico.css">
    <title>Médico</title>
</head>

<body>
    <nav class="menu-lateral">
        <div class="menu">
            <i class="bi bi-list" id="btn-abrir"></i>
        </div>
        <ul>
            <li class="item-menu-medico ativo">
                <a href="#">
                    <span class="icon">
                        <i class="bi bi-clipboard2-pulse-fill"></i>


                        </i>
                    </span>
                    <span class="txt-link">
                        Consultas
                    </span>
                </a>
            </li>
            <li class="item-menu-medico">
                <a href="medico_prontuario.html">

                    <span class="icon">
                        <i class="bi bi-people-fill"></i>
                    </span>
                    <span class="txt-link">
                        Prontuário
                    </span>
                </a>
            </li>
            <li class="item-menu-medico">
                <a href="medico-agendados.html">
                    <span class="icon">
                        <i class="bi bi-clipboard-check-fill"></i>

                    </span>
                    <span class="txt-link">
                        Prontuário armazenado
                    </span>
                </a>
            </li>
            <li class="item-menu">
            </li>
            <div class="bottom-aside">

                <li class="item-menu bottom-item">

                    <a href="medico_conta.html">

                        <span class="icon">
                            <i class="bi bi-file-person"></i>
                        </span>
                        <span class="txt-link">
                            Conta
                        </span>
                    </a>
                </li>
                <li class="item-menu">

                    <a href="login.html">

                        <span class="icon">
                            <i class="bi bi-box-arrow-left"></i>
                        </span>
                        <span class="txt-link">
                            Sair
                        </span>
                    </a>
        </ul>
        </li>
        </div>
        </ul>




    </nav>
    <main>
        <h1>Consultas do dia</h1>

        <div class="agen-feitos">
            <a href="medico-agendados.html">
                <h1 class="titulo-agendamento">Agendamentos do dia</h1>
                <h3>26/03/2024</h3>
                <!-- <h1>13h00 ÁS 14h30</h1>
    <div class="doutor-paciente">
        <h3>Paciente: Neymar Junior</h3>
        
    </div>
    <h3>Doutor: Bruna Marquezine</h3> -->
            </a>
        </div>

        <div class="agen-feitos">
            <a href="medico-agendados.html">
                <h1 class="titulo-agendamento">Agendamentos do dia</h1>
                <h3>27/03/2024</h3>
                <!-- <h1>13h00 ÁS 14h30</h1>
    <div class="doutor-paciente">
        <h3>Paciente: Neymar Junior</h3>
        
    </div>
    <h3>Doutor: Bruna Marquezine</h3> -->
            </a>
        </div>
    </main>
    <footer>
        <div class="sidebar-header">
            <img class="logo-img" src="./src/img/logo-clinware.png" alt="">
        </div>

    </footer>
    <script src="./src/js/menu.js"></script>
</body>

</html>