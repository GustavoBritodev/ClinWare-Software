<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     // Se não estiver logado, redirecionar para a página de login
//     header("Location: login.php");
//     exit;
// }

// Incluir o arquivo de configuração do banco de dados
include('config.php');

// Consultas SQL
$queryAgendamentos = "SELECT a.id_agendamento, m.nm_medico, p.id_paciente, p.nm_paciente, p.sg_sexo, a.dt_horario
                      FROM tb_agendamento a
                      INNER JOIN tb_medico m ON a.id_medico = m.id_medico
                      INNER JOIN tb_paciente p ON a.id_paciente = p.id_paciente";

// Executar a consulta de agendamentos
$dadosAgendamentos = mysqli_query($mysqli, $queryAgendamentos);

// Verificar erros na consulta
if (!$dadosAgendamentos) {
    die("Erro ao executar consulta de agendamentos: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos do Dia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <style>
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
    </style>
</head>

<body>
    <main class="AgendamentosFeitos">
        <h1>AGENDAMENTOS DO DIA</h1>
        
        <?php
        // Exibir os dados em cards dinâmicos
        while ($linhaAgendamento = mysqli_fetch_assoc($dadosAgendamentos)) {
            echo "<div class='card'>";
            echo "<h3>Dados do Agendamento</h3>";
            echo "<p>Nome do médico: {$linhaAgendamento['nm_medico']}</p>";
            echo "<p>Nome do paciente: {$linhaAgendamento['nm_paciente']}</p>";
            echo "<p>Sexo do paciente: {$linhaAgendamento['sg_sexo']}</p>";
            echo "<p>Horário marcado: {$linhaAgendamento['dt_horario']}</p>";
            
            // Gerar URL para o prontuário com base no ID do paciente
            $pacienteId = $linhaAgendamento['id_paciente'];
            $prontuarioUrl = "prontuario.php?id={$pacienteId}";
            
            // Adicionar link para o prontuário com base no ID do paciente
            echo "<a href='{$prontuarioUrl}'>Ver Prontuário</a>";
            echo "</div>";
        }
        ?>
    </main>
</body>

</html>

<?php
// Fechar a consulta e a conexão com o banco de dados
mysqli_free_result($dadosAgendamentos);
mysqli_close($mysqli);
?>
