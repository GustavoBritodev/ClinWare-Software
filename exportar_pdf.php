<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

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

        // Começa a captura do conteúdo HTML
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <title>Relatório de Agendamentos</title>
            <link rel="stylesheet" href="teste-relatorio.css">
            <link rel="stylesheet" href="src/css/teste3.css">
            <link rel="stylesheet" href="src/css/recepcionista2.css">
        </head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            #totals {
                margin-top: 20px;
            }
        </style>

        <body>
            <h1>Relatório de Agendamentos</h1>
            <p>Período: <?php echo $start_date; ?> a <?php echo $end_date; ?></p>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Paciente</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                    ?>
                </tbody>
            </table>
            <div id="totals">
                <p>Pacientes Presentes: <?php echo $present_count; ?></p>
                <p>Pacientes Ausentes: <?php echo $absent_count; ?></p>
            </div>
        </body>

        </html>
<?php
        $html = ob_get_clean();

        // Cria a instância do Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio_agendamentos.pdf", array("Attachment" => 0));

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "Período não selecionado.";
}
?>