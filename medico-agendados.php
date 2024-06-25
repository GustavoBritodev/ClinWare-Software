<?php
// Iniciar a sessão
session_start();

// Verificar se o médico está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir o arquivo de configuração do banco de dados
include('config.php');

// ID do médico logado
$id_medico = $_SESSION['id_usuario'];

// Consultas SQL
$queryMedico = "SELECT * FROM tb_medico WHERE id_usuario = $id_medico";
$queryAgendamentos = "SELECT a.*, p.nm_paciente, p.id_paciente FROM tb_agendamento AS a 
                      JOIN tb_paciente AS p ON a.id_paciente = p.id_paciente
                      WHERE a.id_agend_medi = (SELECT id_medico FROM tb_medico WHERE id_usuario = $id_medico) AND a.ds_status = 1";

// Executar as consultas
$dadosMedico = mysqli_query($mysqli, $queryMedico);
$dadosAgendamentos = mysqli_query($mysqli, $queryAgendamentos);

// Verificar erros nas consultas
if (!$dadosMedico || !$dadosAgendamentos) {
    die("Erro ao executar uma das consultas: " . mysqli_error($mysqli));
}

// Dados do médico logado
$medico = mysqli_fetch_assoc($dadosMedico);
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
        .AgendamentosFeitos {
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
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">ClinWare</span> 
                </a>
                <div class="nav_list">
                    <a href="medico-agendados.php" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name active">Agendamento</span> 
                    </a>
                    <a href="medico-agenda-historico.php" class="nav_link"> 
                        <i class="bi bi-clock-history"></i> 
                        <span class="nav_name">Histórico</span> 
                    </a>
                    <a href="medico_conta.php" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Conta</span> 
                    </a>
                </div> 
                <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> 
                    <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="AgendamentosFeitos">
        <h1 class="OKKK">AGENDAMENTOS DO DIA</h1>
        <div class="miniAgendamento">
            <?php
            // Exibir os dados em cards dinâmicos
            while ($linhaAgendamento = mysqli_fetch_assoc($dadosAgendamentos)) {
                if ($linhaAgendamento) {
                    echo "<div class='card' data-agendamento-id='{$linhaAgendamento['id_agenda']}'>";
                    echo "<h3>Dados do Agendamento</h3>";
                    echo "<p>Nome do médico: {$medico['nm_medico']}</p>";
                    echo "<p>Nome do paciente: {$linhaAgendamento['nm_paciente']}</p>";
                    echo "<p>Horário marcado: {$linhaAgendamento['dt_horario']}</p>";

                    // Gerar URL com o ID do paciente para o prontuário
                    $pacienteId = $linhaAgendamento['id_paciente'];
                    $prontuarioUrl = "medico_prontuario.php?id={$pacienteId}";

                    // Adicionar link para o prontuário com base no ID do paciente
                    echo "<button><a href='{$prontuarioUrl}'>Iniciar consulta</a></button>";
                    echo "<button class='cancel-button'>Cancelar consulta</button>";
                    echo "</div>";
                }
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
                    const agendamentoId = card.getAttribute('data-agendamento-id');

                    if (card && agendamentoId) {
                        fetch('cancelar_agendamento.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id_agendamento=${agendamentoId}`
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data === 'success') {
                                card.remove();
                            } else {
                                alert('Erro ao cancelar a consulta. Por favor, tente novamente.');
                            }
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
