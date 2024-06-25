<?php
// Incluir o arquivo de configuração do banco de dados
include_once('config.php');

// Consulta SQL para buscar os agendamentos
$query = "SELECT a.*, m.nm_medico, p.nm_paciente
          FROM tb_agendamento a
          LEFT JOIN tb_medico m ON a.id_agend_medi = m.id_medico
          LEFT JOIN tb_paciente p ON a.id_paciente = p.id_paciente
          ORDER BY a.dt_horario";

$result = mysqli_query($mysqli, $query);

// Verificar se houve erro na consulta
if (!$result) {
    die("Erro ao consultar agendamentos: " . mysqli_error($mysqli));
}
?>


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

    <link rel="stylesheet" href="./src/css/recepcionista.css">
    <link rel="stylesheet" href="./src/css/teste3.css">
 
    <style>
        .AgendamentoFeitos {
            display: flex;
            flex-direction: column;
        }

        .miniAgendamento {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .card {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
            align-items: center;
            align-content: center;
            flex-wrap: wrap;
        }

        h3 {
            margin-left: 5%;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #333;
        }

        .card p {
            margin-bottom: 8px;
        }

        .a {
            color: #fff;
        }

        button {
            color: #fff;
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
            transition: all .7s;
        }

        button:hover:before {
            top: -30px;
            left: -30px;
        }

        button:active:before {
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
                    <a href="recepcionista-marcar.php" class="nav_link"> <i class="bi bi-calendar-event-fill"></i> <span class="nav_name">Agendamento</span> </a>
                    <a href="recepcionista-agendados.php" class="nav_link active"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Consultas marcadas</span> </a>
                    <a href="recepcionista-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name">Histórico</span> </a>
                    <a href="recepcionista-conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Conta</span> </a>
                </div> <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="AgendamentosFeitos">
        <h1 class="OKKK">AGENDAMENTOS DO DIA</h1>
        <div class="miniAgendamento">
        <?php
            // Exibir os dados em cards dinâmicos
            while ($agendamento = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                    <h3>Dados do Agendamento</h3>
                    <p>Nome do médico: <?php echo $agendamento['nm_medico']; ?></p>
                    <p>Nome do paciente: <?php echo $agendamento['nm_paciente']; ?></p>
                    <p>Horário marcado: <?php echo date('d/m/Y H:i', strtotime($agendamento['dt_horario'])); ?></p>
                    <button class="cancel-button">Cancelar consulta</button>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <script src="./src/js/menu.js"></script>

    <script>
        // Adicionar event listener para o botão "Cancelar consulta"
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.cancel-button').forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.card');
                    if (card) {
                        card.remove();
                    }
                });
            });
        });
    </script>

</body>
</html>