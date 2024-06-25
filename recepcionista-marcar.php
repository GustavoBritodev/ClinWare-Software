<?php

include_once('config.php');

if (isset($_POST['submit'])) {

    $errors = [];

    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $observacao = $_POST['observacao'];
    $medicoId = $_POST['medico'];
    $pacienteId = $_POST['paciente'];

    $dataHora = $data . ' ' . $hora;

    try {
        $horaDate = new DateTime($dataHora);
        $currentDate = new DateTime();

        if ($horaDate < $currentDate) {
            $errors[] = 'Você não pode marcar no passado.';
        }
    } catch (Exception $e) {
        $errors[] = 'Data ou hora inválida.';
    }

    if (empty($errors)) {
        // Inserir agendamento no banco de dados
        $query = "INSERT INTO tb_agendamento (ds_status, dt_horario, id_agend_medi, id_paciente) VALUES ('1', '$dataHora', '$medicoId', '$pacienteId')";

        if (mysqli_query($mysqli, $query)) {
            echo "<script>alert('Consulta marcada com sucesso!'); window.location.href='recepcionista-marcar.php';</script>";
        } else {
            echo "<script>alert('Erro ao marcar a consulta. Tente novamente.'); window.location.href='recepcionista-marcar.php';</script>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error'); window.location.href='recepcionista-marcar.php';</script>";
        }
    }
}
?>


<?php

include_once('config.php');

if (isset($_POST['submit'])) {
    $nomePac = $_POST['nomePaciente'];
    $cpfPac = $_POST['cpf'];
    $dtNasc = $_POST['nascimento'];
    $cepPac = $_POST['cep'];
    $genero = $_POST['sexo'];
    $rgPac = $_POST['errege'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nmConvenio = $_POST['nomeConvenio'];
    $nmrCarteirinha = $_POST['carteirinha'];
    $validadeConvenio = $_POST['dtValidade'];
    $coberturaConvenio = $_POST['coberturaConvenio'];
    $planoConvenio = $_POST['tpPlano'];

    $errors = [];

    // // Validação da data de nascimento
    // $nascimentoDate = new DateTime($dtNasc);
    // $currentDate = new DateTime();
    // if ($nascimentoDate > $currentDate) {
    //     $errors[] =  "<script language='javascript' type='text/javascript'>alert('Você colocou a data de nascimento futura.'); window.location.href='recepcionista.php';</script>";
    // }

    // // Validação da data de validade
    // $dtValidadeDate = new DateTime($validadeConvenio);
    // if ($dtValidadeDate < $currentDate) {
    //     $errors[] = "<script language='javascript' type='text/javascript'>alert('A validade está expirada.'); window.location.href='recepcionista.php';</script>";
    // }

    if (empty($errors)) {
        // Aqui você pode adicionar o código para processar e salvar os dados no banco
        $result1 = mysqli_query($mysqli, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$email', '$senha', '3')");
        $result2 = mysqli_query($mysqli, "INSERT INTO tb_convenio(nm_convenio, dt_validade, ds_cobertura, ds_tipo_de_plano, nmr_carteirinha) VALUES ('$nmConvenio', '$validadeConvenio', '$coberturaConvenio', '$planoConvenio', '$nmrCarteirinha')");
        $result3 = mysqli_query($mysqli, "INSERT INTO tb_paciente(nm_paciente, cd_cpf, dt_nascimento, cd_cep, sg_sexo, ds_email, cd_rg, id_usuario, id_convenio) VALUES ('$nomePac', '$cpfPac', '$dtNasc', '$cepPac', '$genero', '$email', '$rgPac', (SELECT max(id_usuario) FROM tb_usuario), (SELECT max(id_convenio) FROM tb_convenio))") or die("Deu erro!");
        
        if ($result1 && $result2 && $result3) {
          header("Location: recepcionista-marcar.php");
        } else {
            echo "Erro ao realizar o cadastro.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
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
    <link rel="stylesheet" href="./src/css/teste3.css">
    <link rel="stylesheet" href="./src/css/recepcionista.css">
    <title>Recepcionista</title>
    <style>
        .button {
            color: #fff;
            font-family: inherit;
            display: inline-block;
            width: 400px;
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
            text-transform: uppercase;
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
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">ClinWare</span> </a>
                <div class="nav_list"> <a href="recepcionista.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Cadastrar pacientes</span> </a>
                    <a href="recepcionista-marcar.php" class="nav_link active"> <i class="bi bi-calendar-event-fill"></i> <span class="nav_name">Agendamento</span> </a>
                    <a href="recepcionista-agendados.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Consultas marcadas</span> </a>
                    <a href="recepcionista-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name">Histórico</span> </a>
                    <a href="recepcionista-conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Conta</span> </a>
                </div> <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="container">
        <div class="text">
            Marcar consulta
        </div>
        <form action="recepcionista-agendados.php" method="post">
            <div class="form-row">
                <label for="">Dia:</label>
                <div class="input-data">
                    <input name="data" type="date" required />
                    <div class="underline"></div>
                </div>
                <label for="">Hora:</label>
                <div class="input-data">
                    <input name="hora" type="time" required />
                    <div class="underline"></div>
                </div>
                <label for="">Paciente:</label>
                <div class="input-data">
                <select name="paciente" aria-placeholder="Selecione um paciente:" required="">
                        <?php
                        // Consulta SQL para buscar os nomes dos pacientes
                        $sql = "SELECT id_paciente, nm_paciente FROM tb_paciente";
                        $result = $mysqli->query($sql);

                        // Preenche o select com os nomes dos pacientes
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_paciente"] . "'>" . $row["nm_paciente"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum paciente encontrado</option>";
                        }
                        ?>
                        
                    </select>
                    <div class="underline"></div>
                </div>
                <label for="">Médico:</label>
                <div class="input-data">
                    <select name="medico" aria-placeholder="Selecione um médico:" required>
                        
                        <?php
                        // Consulta SQL para buscar os nomes dos médicos
                        $sql = "SELECT id_medico, nm_medico FROM tb_medico";
                        $result = $mysqli->query($sql);
    
                        // Preenche o select com os nomes dos médicos
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_medico"] . "'>" . $row["nm_medico"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum médico encontrado</option>";
                        }
    
                        ?>
                    </select>
            </div>

            <div class="form-row">

                </div>

                <br />
            </div>
            <div class="form-row submit-btn">
                <input class="button" type="submit" name="submit" value="Cadastrar">
            </div>
            </div>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        // Initially show navbar
                        nav.classList.add('show')
                        toggle.classList.add('bx-x')
                        bodypd.classList.add('body-pd')
                        headerpd.classList.add('body-pd')

                        toggle.addEventListener('click', () => {
                            // Toggle navbar
                            nav.classList.toggle('show')
                            // Change icon
                            toggle.classList.toggle('bx-x')
                            // Add/remove padding to body
                            bodypd.classList.toggle('body-pd')
                            // Add/remove padding to header
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))
            });
        </script>
    </main>
</body>

</html>