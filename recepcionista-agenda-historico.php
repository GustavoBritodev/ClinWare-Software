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
    <title>Agendamentos ClinWare</title>
    <style>
        .AgendamentosFeitos {
            display: flex;
            flex-direction: column;
        }

        .botaoreal {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            transition: background-color 0.5s ease;
            height: 50px;
            border-radius: 8px;
        }

        .botaoreal:hover {
            background-color: #2980b9;
        }

        .botaofalso1 {
            background-color: #eb0900;
            color: white;
            border: none;
            margin-top: 5px;
            padding: 10px 20px;
            font-size: 20px;
            transition: background-color 0.5s ease;
            height: 50px;
            border-radius: 8px;
        }

        .botaofalso1:hover {
            background-color: #d30800;
        }

        .miniAgendamento {
            display: block;
            flex-direction: column;
            gap: 20px;
            max-width: 100%;
            border: 2.5px solid grey;
            padding: 1.513em;
        }

        .card {
            max-width: 100%;
            width: 100em;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            gap: 1em;
            justify-content: space-between;
        }

        .btns {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: fit-content;
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
            color: #2b1165;
        }

        select {
            font-size: 0.76em;
            padding: 10px;
            width: 200px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .textoradio {
            display: inline-flex;
        }

        input[type="radio"] {
            appearance: none;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 1.15em;
            height: 1.15em;
            border: 0.15em solid currentColor;
            border-radius: 50%;
            transform: translateY(-0.075em);
            display: grid;
            place-content: center;
        }

        input[type="radio"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            border-radius: 50%;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            box-shadow: inset 1em 1em var(--form-control-color);
            background-color: CanvasText;
        }

        input[type="radio"]:checked::before {
            transform: scale(1);
        }

        input[type="radio"]:focus {
            outline-offset: max(2px, 0.15em);
        }

        .radioo {
            margin: 8px;
            display: inline-flex;
        }

        form {
            min-width: 35%;
            border: 3px outset #2d3242;
            border-radius: 10px;
        }

        input[type=search] {
            border: 1px solid white;
            box-sizing: border-box;
            font-size: 1.2em;
            height: 2em;
            margin-left: 0vw;
            outline: solid #fc0 0;
            padding: .5em;
            transition: all 2s ease-in;
            width: 30vw;
            min-width: 30vw;
        }

        .bibi-search {
            margin-left: 7px;
            margin-right: -4px;
        }

        .conteudo {
            display: none;
        }

        .mostrar {
            display: block;
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
                    <a href="recepcionista-agendados.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Consultas marcadas</span> </a>
                    <a href="recepcionista-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name active">Histórico</span> </a>
                    <a href="recepcionista-conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Conta</span> </a>
                </div> <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>
    <main class="AgendamentosFeitos">
        <h1 class="OKKK">Histórico de Agendamentos</h1>
        <div>
            <label class="textoradio">
                <input type="radio" name="conteudo" value="cancelados" onchange="mostrarConteudo(this.value)" />
                Agendamentos cancelados
            </label>
            <label class="textoradio">
                <input type="radio" name="conteudo" value="finalizados" onchange="mostrarConteudo(this.value)" />
                Agendamentos finalizados
            </label>
        </div>
        <form>
            <i class="bi bi-search"></i> <input type="search" placeholder="Pesquisar...">
        </form>
        <h4>Filtrar por
            <select id="sortSelect">
                <option value="a-z">De A-Z</option>
                <option value="antigo-atual">Recentes</option>
                <option value="atual-antigo">Antigos</option>
                <option value="horario">Horário</option>
            </select>
        </h4>
        <?php
        include_once('config.php');

        if ($mysqli->connect_error) {
            die("Erro de conexão: " . $mysqli->connect_error);
        }

        // Inicialização das variáveis de busca e ordenação
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        // Consulta SQL para agendamentos cancelados
        $sqlCancelados = "SELECT a.dt_horario, m.nm_medico, p.nm_paciente 
                      FROM tb_agendamento a 
                      JOIN tb_agenda_medico am ON a.id_agend_medi = am.id_agen_medi
                      JOIN tb_medico m ON am.id_medico = m.id_medico
                      JOIN tb_paciente p ON a.id_paciente = p.id_paciente
                      WHERE a.ds_status = 0 AND (m.nm_medico LIKE '%$search%' OR p.nm_paciente LIKE '%$search%')";

        // Consulta SQL para agendamentos finalizados
        $sqlFinalizados = "SELECT a.id_agenda, a.dt_horario, m.nm_medico, p.nm_paciente, p.id_paciente 
                   FROM tb_agendamento a 
                   JOIN tb_agenda_medico am ON a.id_agend_medi = am.id_agen_medi
                   JOIN tb_medico m ON am.id_medico = m.id_medico
                   JOIN tb_paciente p ON a.id_paciente = p.id_paciente
                   WHERE a.ds_status = 1 AND (m.nm_medico LIKE '%$search%' OR p.nm_paciente LIKE '%$search%')";

        // Adiciona a ordenação dependendo da opção escolhida
        switch ($sort) {
            case 'a-z':
                $sqlCancelados .= " ORDER BY m.nm_medico ASC";
                $sqlFinalizados .= " ORDER BY m.nm_medico ASC";
                break;
            case 'antigo-atual':
                $sqlCancelados .= " ORDER BY a.dt_horario DESC";
                $sqlFinalizados .= " ORDER BY a.dt_horario DESC";
                break;
            case 'atual-antigo':
                $sqlCancelados .= " ORDER BY a.dt_horario ASC";
                $sqlFinalizados .= " ORDER BY a.dt_horario ASC";
                break;
            case 'horario':
                $sqlCancelados .= " ORDER BY a.dt_horario ASC";
                $sqlFinalizados .= " ORDER BY a.dt_horario ASC";
                break;
            default:
                break;
        }

        // Executa as consultas SQL
        $resultCancelados = $mysqli->query($sqlCancelados);
        $resultFinalizados = $mysqli->query($sqlFinalizados);

        // Verifica se houve resultados para agendamentos cancelados
        // Verifica se houve resultados para agendamentos cancelados
if ($resultCancelados && $resultCancelados->num_rows > 0) {
    echo "<div id='cancelados' class='conteudo'>";
    while ($row = $resultCancelados->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<div class='info'>";
        echo "<p>Horário: " . $row['dt_horario'] . "</p>";
        echo "<p>Medico: " . $row['nm_medico'] . "</p>";
        echo "<p>Paciente: " . $row['nm_paciente'] . "</p>";
        // Adicionar o botão "Reagendar consulta" com o ID da agenda como atributo
        echo "<button class='botaoreal reagendar-consulta'>Reagendar consulta</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    $resultCancelados->free(); // Libera a memória do resultado
} else {
    echo "<p id='cancelados' class='conteudo'>Nenhum agendamento cancelado encontrado.</p>";
}


        // Verifica se houve resultados para agendamentos finalizados
        if ($resultFinalizados && $resultFinalizados->num_rows > 0) {
            echo "<div id='finalizados' class='conteudo'>";
            while ($row = $resultFinalizados->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='info'>";
                echo "<p>Horário: " . $row['dt_horario'] . "</p>";
                echo "<p>Medico: " . $row['nm_medico'] . "</p>";
                echo "<p>Paciente: " . $row['nm_paciente'] . "</p>";
                // echo "<button class='botaoreal' onclick='visualizarProntuario(" . $row['id_paciente'] . ")'>Ver prontuário</button>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            $resultFinalizados->free(); // Libera a memória do resultado
        } else {
            echo "<p id='finalizados' class='conteudo'>Nenhum agendamento finalizado encontrado.</p>";
        }

        // Fecha a conexão com o banco de dados
        $mysqli->close();
        ?>
        <script>
            document.querySelector("form").addEventListener("submit", function(event) {
                event.preventDefault();
                var searchInput = document.querySelector("input[type='search']");
                var sortSelect = document.querySelector("#sortSelect");
                var search = searchInput.value;
                var sort = sortSelect.value;
                window.location.href = "medico-agenda-historico.php?search=" + search + "&sort=" + sort;
            });

            document.getElementById("sortSelect").addEventListener("change", function() {
                var searchInput = document.querySelector("input[type='search']");
                var sortSelect = document.querySelector("#sortSelect");
                var search = searchInput.value;
                var sort = sortSelect.value;
                window.location.href = "medico-agenda-historico.php?search=" + search + "&sort=" + sort;
            });

            function mostrarConteudo(valor) {
                var conteudos = document.querySelectorAll(".conteudo");
                conteudos.forEach(function(conteudo) {
                    conteudo.classList.remove("mostrar");
                });
                var conteudoSelecionado = document.getElementById(valor);
                if (conteudoSelecionado) {
                    conteudoSelecionado.classList.add("mostrar");
                }
            }

       
    // document.addEventListener('DOMContentLoaded', function() {
    //     // Adicionar event listener para os botões "Reagendar consulta" (agendamentos cancelados)
    //     document.querySelectorAll('.reagendar-consulta').forEach(button => {
    //         button.addEventListener('click', function() {
    //             const idAgenda = this.getAttribute('data-id-agenda');
    //             window.location.href = `medico_conta.php?id=${idAgenda}`;
    //         });
    //     });
    // });


    document.addEventListener('DOMContentLoaded', function() {
                // Adicionar event listener para os botões "Reagendar consulta" (agendamentos cancelados)
                document.querySelectorAll('.reagendar-consulta').forEach(button => {
                    button.addEventListener('click', function() {
                        // Remove a div 'card' correspondente
                        var card = this.closest('.card');
                        if (card) {
                            card.remove();
                        }
                        // Aqui você pode adicionar qualquer lógica adicional que precisar, como uma chamada AJAX para reagendar a consulta
                    });
                });
            });
            
        </script>
        <script src="./src/js/menu.js"></script>
        <script>
            function visualizarProntuario(idPaciente) {
                window.location.href = "mostra_prontuario.php?id=" + idPaciente;
            }
        </script>
    </main>
</body>

</html>