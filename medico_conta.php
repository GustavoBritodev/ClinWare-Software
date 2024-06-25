<?php
session_start();

include_once('config.php');

// Inicializar variáveis de usuário
$usuario = array();
$usuario2 = array();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se há envio de arquivo (imagem)
    if (isset($_FILES["imagem"])) {
        $imagem = $_FILES['imagem'];

        // Verificar erros de envio de arquivo
        if ($imagem['error'])
            die("Falha ao enviar imagem");

        // Verificar tamanho do arquivo
        if ($imagem['size'] > 2097152)
            die("Imagem muito grande!!");

        // Pasta para salvar a imagem
        $pasta = "imgcontas/";
        $nomeDaImagem = $imagem['name'];
        $novoNomeDaImagem = uniqid();
        $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

        // Verificar tipo de imagem
        if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg')
            die("Tipo de imagem não aceita");

        // Caminho para salvar a imagem
        $path = $pasta . $novoNomeDaImagem . "." . $extensao;

        // Mover arquivo para a pasta desejada
        $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);

        if ($deu_certo) {
            // Inserir ou atualizar o caminho da imagem no banco de dados
            $mysqli->query("UPDATE tb_medico SET nm_imagem ='$path' WHERE id_medico = '$id_usuario'") or die($mysqli->error);
        }
    }

    // Verificar e atualizar nome do médico
    if (!empty($_POST['nome'])) {
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $mysqli->query("UPDATE tb_medico SET nm_medico ='$nome' WHERE id_medico = '$id_usuario'") or die($mysqli->error);
    }

    // Verificar e atualizar senha do usuário
    if (!empty($_POST['senha'])) {
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        $mysqli->query("UPDATE tb_usuario SET cd_senha ='$senha' WHERE id_usuario = '$id_usuario'") or die($mysqli->error);
    }

    // Verificar e atualizar email do usuário
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $mysqli->query("UPDATE tb_usuario SET nm_login ='$email' WHERE id_usuario = '$id_usuario'") or die($mysqli->error);
    }

    // Recarregar os dados atualizados do banco de dados
    $sql_query = $mysqli->query("SELECT * FROM tb_medico WHERE id_medico = '$id_usuario'") or die($mysqli->error);
    $usuario = $sql_query->fetch_assoc();

    $sql_query2 = $mysqli->query("SELECT * FROM tb_usuario WHERE id_usuario = '$id_usuario'") or die($mysqli->error);
    $usuario2 = $sql_query2->fetch_assoc();
} else {
    // Carregar dados do usuário ao carregar a página pela primeira vez
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        // Consulta para buscar informações do usuário com base no ID da sessão
        $sql_query = $mysqli->query("SELECT * FROM tb_medico WHERE id_medico = '$id_usuario'") or die($mysqli->error);
        $usuario = $sql_query->fetch_assoc();

        $sql_query2 = $mysqli->query("SELECT * FROM tb_usuario WHERE id_usuario = '$id_usuario'") or die($mysqli->error);
        $usuario2 = $sql_query2->fetch_assoc();
    } else {
        // Redirecionar para a página de login se não houver sessão válida
        header("Location: login.php");
        exit; // Encerrar o script para evitar que o resto do código seja executado
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="./src/css/recepcionista2.css">
    <link rel="stylesheet" href="./src/css/teste3.css">
    <link rel="stylesheet" href="teste-relatorio.css">

    <style>
        .button {
            --color: #560bad;
            font-family: inherit;
            display: inline-block;
            width: 9.5rem;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--color);
            transition: color .5s;
            z-index: 1;
            font-size: 17px;
            border-radius: 6px;
            font-weight: 500;
            background: rgba(14, 14, 240, 0.8);
        }

        .button:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: var(--color);
            height: 150px;
            width: 200px;
            border-radius: 50%;
        }

        .button:hover {
            color: #fff;
        }

        .button:before {
            top: 100%;
            left: 100%;
            transition: all .7s;
        }

        .button:hover:before {
            top: -30px;
            left: -30px;
        }

        .button:active:before {
            background: #3a0ca3;
            transition: background 0s;
        }


        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 16px;
            margin-bottom: 12px;
            color: #333;
        }

        .card p {
            margin-bottom: 8px;
        }

        a {
            color: #fff;
        }

        button {
            color: #fff;
            --color: #560bad;
            width: 10em;
            font-family: inherit;
            display: inline-block;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--color);
            transition: color .5s;
            z-index: 1;
            font-size: 17px;
            border-radius: 6px;
            font-weight: 500;
            background: rgba(14, 14, 240, 0.8);

        }

        button:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: var(--color);
            height: 150px;
            width: 200px;
            border-radius: 50%;
        }

        button:hover {
            color: #fff;
        }

        button:before {
            top: 100%;
            left: 100%;
            transition: all;

            button:active:before {
                background: #3a0ca3;
                transition: background 0s;
            }
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">ClinWare</span> </a>
                <div class="nav_list">

                    <a href="medico-agendados.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Agendamento</span> </a>

                    <a href="medico-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name">Histórico</span> </a>

                    <a href="medico_conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name active">Conta</span> </a>

                </div> <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>
    <main>
        <h1 class="titulo">Conta</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="formconta">
      
            <?php if (!empty($usuario['nm_imagem'])) : ?>
                <img height="200" src="<?php echo $usuario['nm_imagem']; ?>" class="imgconta">
            <?php else : ?>
                <img height="200" src="./imgcontas/icon-default.jpg" class="imgconta">
            <?php endif; ?>

            <label class="lblform">Login:</label>
            <input type="text" class="inputconta" name="nome" value="<?php echo isset($usuario['nm_medico']) ? $usuario['nm_medico'] : ''; ?>" <?php echo isset($_POST['nome']) ? '' : 'disabled'; ?>>
            <br>
            <label class="lblform">Senha:</label>
            <div class="password-input">
            <input type="password" class="inputconta" name="senha" value="<?php echo isset($usuario2['cd_senha']) ? $usuario2['cd_senha'] : ''; ?>" <?php echo isset($_POST['senha']) ? '' : 'disabled'; ?>>
        </div>
        <i class="bi bi-eye password-toggle" id="togglePassword"></i>

            <br>
           
        </form>
    </main>
    <script src="./src/js/menu.js"></script>

    <script>
    // JavaScript para alternar visibilidade da senha
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('.password-input input');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
</body>


</html>