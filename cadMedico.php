<?php

// if (isset($_POST['cadMedico'])) {


// 	include_once('config.php');

// 	$nomeMed = $_POST['nomeMedico'];
// 	$cpfMed = $_POST['cpf'];
// 	$crmMed = $_POST['crm'];
//     $rgMed = $_POST['rg'];
// 	$uf_crmMed = $_POST['ufcrm'];
// 	$especMed = $_POST['espec'];
// 	$clncMed = $_POST['clnc'];
// 	$emailMed = $_POST['email'];
// 	$senhaMed = $_POST['senha'];
	

// 	$result = mysqli_query($conexao, "INSERT INTO tb_medico(cd_crm, cd_cpf, nm_medico, cd_rg, uf_crm, id_usuario, id_especialidade) VALUES ('$crmMed', '$cpfMed', '$nomeMed', '$rgMed', '$uf_crmMed', (SELECT max(id_usuario) FROM tb_usuario), (SELECT max(id_especialidade) FROM tb_especialidades))") OR die("Deu erro!");

// 	$result = mysqli_query($conexao, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$emailMed', '$senhaMed', '1')");
	
//     $result = mysqli_query($conexao, "INSERT INTO tb_especialidades(nm_especialidade, id_clinicas) VALUES ('$especMed', (SELECT max(id_clinicas) FROM tb_clinicas))");

// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/aside.css">
    <link rel="stylesheet" href="./src/css/recepcionista.css">
    <title>Médico</title>
</head>

<body>

    <main class="container">

        <div class="text">
            Cadastro
        </div>
        <form action="login.php" method="post">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="nomeMedico" required>
                    <div class="underline"></div>
                    <label for="">Nome completo:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="cpf" required>
                    <div class="underline"></div>
                    <label for="">CPF:</label>
                </div>

            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="crm" required>
                    <div class="underline"></div>
                    <label for="">CRM:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="rg" required>
                    <div class="underline"></div>
                    <label for="">RG:</label>
                </div>

                <div class="input-data">
                    <input type="text" name="ufcrm" required>
                    <div class="underline"></div>
                    <label for="">UF CRM:</label>
                </div>

            </div>
          
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="espec" required>
                    <div class="underline"></div>
                    <label for="">Especialidade:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="clnc" required>
                    <div class="underline"></div>
                    <label for="">Clínica:</label>
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
                                <input type="submit" name="cadMedico" value="Cadastrar">
                            </div>
                        </div>
                    </a>
        </form>

    </main>
    <script src="./src/js/menu.js"></script>
</body>

</html>