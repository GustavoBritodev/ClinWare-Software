<?php
include('config.php');

// Consultas
$queryMedicos = "SELECT * FROM tb_medico";
$queryPacientes = "SELECT * FROM tb_paciente";
$queryAgendamentos = "SELECT * FROM tb_agendamento";

// Executar consultas
$dadosMedicos = mysqli_query($mysqli, $queryMedicos);
$dadosPacientes = mysqli_query($mysqli, $queryPacientes);
$dadosAgendamentos = mysqli_query($mysqli, $queryAgendamentos);

// Verificar erros nas consultas
if (!$dadosMedicos || !$dadosPacientes || !$dadosAgendamentos) {
    die("Erro ao executar uma das consultas: " . mysqli_error($mysqli));
}

$data = $_POST['data'];
$hora = $_POST['hora'];

$dataHora = $data . ' ' . $hora;



$sql = "INSERT INTO tb_agendamento(dt_horario) VALUES ('{$dataHora}')";


$rs = mysqli_query($mysqli, $sql) or die("Erro ao executar a consulta. " . mysqli_error($mysqli));
?>



<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de configuração do banco de dados
include('config.php');

// Consultas SQL
$queryMedicos = "SELECT * FROM tb_medico";
$queryPacientes = "SELECT * FROM tb_paciente";
$queryAgendamentos = "SELECT * FROM tb_agendamento";

// Executar as consultas
$dadosMedicos = mysqli_query($mysqli, $queryMedicos);
$dadosPacientes = mysqli_query($mysqli, $queryPacientes);
$dadosAgendamentos = mysqli_query($mysqli, $queryAgendamentos);

// Verificar erros nas consultas
if (!$dadosMedicos || !$dadosPacientes || !$dadosAgendamentos) {
    die("Erro ao executar uma das consultas: " . mysqli_error($mysqli));
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
        .AgendamentoFeitos{
            display: flex;
            flex-direction: column;
        }
        .miniAgendamento{
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .card {
                    
                        border: 1px solid #ccc;
                        border-radius: 8px;
                        padding: 16px;
                        margin-bottom: 20px;
                    }
                    h3{
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
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    
    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">ClinWare</span> </a>
                <div class="nav_list"> <a href="recepcionista.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Cadastrar pacientes</span> </a>
                    <a href="recepcionista-marcar.php" class="nav_link"> <i class="bi bi-calendar-event-fill"></i> <span class="nav_name">Agendamento</span> </a>
                    <a href="recepcionista-agendados.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Consultas marcadas</span> </a>
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
        while ($linhaMedico = mysqli_fetch_assoc($dadosMedicos)) {
            $linhaPaciente = mysqli_fetch_assoc($dadosPacientes);
            $linhaAgendamento = mysqli_fetch_assoc($dadosAgendamentos);
            
            if ($linhaMedico && $linhaPaciente && $linhaAgendamento) {// Exibir os dados em um card
                echo "<div class='card'>";
                echo "<h3>Dados do Agendamento</h3>";
                echo "<p>Nome do médico: {$linhaMedico['nm_medico']}</p>";
                echo "<p>Nome do paciente: {$linhaPaciente['nm_paciente']}</p>";
                echo "<p>Sexo do paciente: {$linhaPaciente['sg_sexo']}</p>";
                echo "<p>Horário marcado: {$linhaAgendamento['dt_horario']}</p>";
                
                echo "</div>";
              
            }
        }
        ?>

</div>
</main>

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

</body>

</html>