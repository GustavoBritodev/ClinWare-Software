
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
    <title>Recepcionista</title>
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
        <h1 class="OKKK">AGENDAMENTOS DO DIA</h1>
        
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
            
            // Gerar URL com o ID do paciente para o prontuário
            $pacienteId = $linhaPaciente['id_paciente'];
            $prontuarioUrl = "medico_prontuario.php?id={$pacienteId}";
            
            // Adicionar link para o prontuário com base no ID do paciente
            echo "<a href='{$prontuarioUrl}'>Ver Prontuário</a>";
            echo "</div>";
        }
    }
        ?>

    </main>

</body>

</html>