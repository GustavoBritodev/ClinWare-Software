<?php

// if (isset($_POST['cadRecep'])) {


// 	include_once('config.php');

// 	$nomeRecep = $_POST['nomeRecep'];
// 	$cpfRecep = $_POST['cpf'];
//     $rgRecep = $_POST['rg'];
// 	$emailRecep = $_POST['email'];
// 	$senhaRecep = $_POST['senha'];
	

// 	$result = mysqli_query($conexao, "INSERT INTO tb_recepcionista(nm_recepcionista, cd_cpf, cd_rg, id_usuario) VALUES ('$nomeRecep', '$cpfRecep', '$rgRecep', (SELECT max(id_usuario) FROM tb_usuario))") OR die("Deu erro!");

// 	$result = mysqli_query($conexao, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$emailRecep', '$senhaRecep', '2')");
	
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./src/css/aside.css">
    <link rel="stylesheet" href="./src/css/recepcionista.css">
    <title>Recepcionista</title>
</head>

<body>

    <main class="container">

        <div class="text">
            Cadastro
        </div>
        <form action="login.php" method="post">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="nomeRecep" required>
                    <div class="underline"></div>
                    <label for="">Nome completo:</label>
                </div>

            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="cpf" required>
                    <div class="underline"></div>
                    <label for="">CPF:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="rg" required>
                    <div class="underline"></div>
                    <label for="">RG:</label>
                </div>

            </div>

            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="email" required>
                    <div class="underline"></div>
                    <label for="">Email:</label>
                </div>
                <div class="input-data">
                    <input type="password" name="senha" required>
                    <div class="underline"></div>
                    <label for="">Senha:</label>
                </div>

            </div>
          
            
            <div class="form-row">
                <div class="input-data textarea">
                    <textarea rows="8" cols="80" ></textarea>
                    <br />
                    <div class="underline"></div>
                    <label for="">Observação:</label>
                    <br />
                    <a href="login.php">
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="submit" name="cadRecep" value="Cadastrar">
                            </div>
                        </div>
                    </a>
        </form>

    </main>
    <script src="./src/js/menu.js"></script>
</body>

</html>