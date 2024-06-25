<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Agendamentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="teste-relatorio.css">
    <link rel="stylesheet" href="src/css/teste3.css">
    <!-- <link rel="stylesheet" href="src/css/recepcionista2.css"> -->
    <style>
        button {
 color: #fff;
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

<body id="body-pd" class="rubik-<uniquifier>">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
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


    <div class="container">
        <h1>Relatório de Agendamentos</h1>
        <form id="report-form" action="" method="POST">
            <h2>Selecione o Período para o Relatório</h2>
            <div class="radio-group">
                <label for="start_date">Data Inicial:</label>
                <input type="date" id="start_date" name="start_date" required>
                <label for="end_date">Data Final:</label>
                <input type="date" id="end_date" name="end_date" required>
                <input type="submit" value="Filtrar">
            </div>
        </form>
        <div id="report">

            <p id="report-period"></p>
            <table id="report-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Paciente</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aqui vão ficar as rows dinâmicas -->
                    <?php

                    $present_count = 0;
                    $absent_count = 0;

                    if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];

                        include_once('config.php');

                        // Verifica a conexão
                        if ($mysqli->connect_error) {
                            die("Falha na conexão: " . $mysqli->connect_error);
                        }

                        // Query com JOIN para selecionar os dados no período
                        $query = "
                            SELECT tb_agenda_medico.dt_abertura, tb_agendamento.dt_horario as data, tb_paciente.nm_paciente AS paciente, tb_agendamento.ds_status AS status
                            FROM tb_agenda_medico
                            JOIN tb_agendamento ON tb_agenda_medico.id_agen_medi = tb_agendamento.id_agend_medi
                            JOIN tb_paciente ON tb_agendamento.id_paciente = tb_paciente.id_paciente
                            WHERE tb_agenda_medico.dt_abertura BETWEEN ? AND ?
                        ";

                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->bind_param("ss", $start_date, $end_date);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Contadores de pacientes presentes e ausentes
                            $present_count = 0;
                            $absent_count = 0;

                            // Exibe os resultados
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Converte o status
                                    $status = $row["status"] == 1 ? "Presente" : "Faltou";
                                    echo "<tr><td>" . $row["data"] . "</td><td>" . $row["paciente"] . "</td><td>" . $status . "</td></tr>";

                                    // Incrementa os contadores
                                    if ($row["status"] == 1) {
                                        $present_count++;
                                    } else {
                                        $absent_count++;
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='3'>Nenhum dado encontrado para o período selecionado.</td></tr>";
                            }

                            $stmt->close();
                        } else {
                            echo "Erro na preparação da consulta: " . $mysqli->error;
                        }

                        $mysqli->close();
                    }
                    ?>
                </tbody>
            </table>
            <div id="totals">
                <p>Pacientes Presentes: <span id="present-count"><?php echo $present_count; ?></span></p>
                <p>Pacientes Ausentes: <span id="absent-count"><?php echo $absent_count; ?></span></p>
            </div>
            <div class="export-buttons">
                <form action="exportar_pdf.php" method="post" style="display: inline;">
                    <input type="hidden" name="start_date" value="<?php echo $start_date; ?>">
                    <input type="hidden" name="end_date" value="<?php echo $end_date; ?>">
                    <button type="submit">Exportar PDF</button>
                </form>
              
            </div>
        </div>
    </div>

    <!-- <script src="teste-relatorio.js"></script> -->
    <script src="./src/js/menu.js"></script>
</body>

</html>