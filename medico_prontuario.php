<?php

session_start(); // Inicia a sessão

include_once('config.php');




// Capturar o ID do paciente da URL
$pacienteId = $_GET['id'];

// Consulta SQL para obter os dados do paciente com base no ID
$queryPaciente = "SELECT * FROM tb_paciente WHERE id_paciente = {$pacienteId}";

// Executar a consulta do paciente
$dadosPaciente = mysqli_query($mysqli, $queryPaciente);

// Verificar se o paciente foi encontrado
// if (!$dadosPaciente || mysqli_num_rows($dadosPaciente) === 0) {
//     // Se o paciente não for encontrado, redirecionar para a página anterior
//     header("Location: login.php");
//     exit;
// }

// Obter os dados do paciente
$linhaPaciente = mysqli_fetch_assoc($dadosPaciente);

// Verifica se a sessão contém o id_usuario
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Verifica se a conexão com o banco de dados está estabelecida
    if ($mysqli) {
        // Consulta para buscar informações do paciente com base no id_usuario
        $query = "SELECT p.nm_paciente, p.cd_cpf, p.cd_rg, p.sg_sexo, p.dt_nascimento, p.cd_cep, c.nm_convenio, c.nmr_carteirinha, c.ds_tipo_de_plano, c.dt_validade, c.ds_cobertura FROM tb_convenio AS c JOIN tb_paciente AS p ON p.id_convenio = c.id_convenio WHERE id_paciente = '$pacienteId'";

        //(SELECT id_paciente FROM tb_paciente WHERE id_usuario = $id_usuario)"

        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
        } else {
            echo "Erro na consulta ao banco de dados.";
        }
    } else {
        echo "Erro na conexão com o banco de dados.";
    }
// } else {
//     // Se a sessão não estiver iniciada, redireciona para a página de login
//     header("Location: login.php");
//     exit(); // Certifique-se de sair após redirecionar
}

include_once('config.php');

if (isset($_POST['enviaProntu'])) {


    include_once('config.php');

    $ab_prontu = $_POST['data_abertura'];
    $fech_prontu = $_POST['data_fechamento'];
    $acomp = $_POST['aco'];
    $alt_prontu = $_POST['alt'];
    $peso_prontu = $_POST['peso'];
    $imc_prontu = $_POST['imc'];
    $tp_sang_prontu = $_POST['tis'];
    $doen_preg = $_POST['dr'];
    $doen_pres = $_POST['dp'];
    $alergia = $_POST['al'];
    $doen_corac = $_POST['dc'];
    $feb_reum = $_POST['tfr'];
    $diabetes = $_POST['di'];
    $ing_alcool = $_POST['ia'];
    $fumante = $_POST['fu'];
    $uso_antib = $_POST['ua'];
    $dific_cicat = $_POST['ddc'];
    $uso_medic = $_POST['um'];
    $gravidez = $_POST['eg'];
    $press_art = $_POST['pa'];
    $outr_anot = $_POST['out'];
    $prescricao = $_POST['outros'];

    $result = mysqli_query($mysqli, "INSERT INTO tb_prontuario(dt_abertura, dt_fechamento, nm_acompanhante, ds_altura, ds_peso, ds_imc, ds_tipo_sanguineo, ds_doenca_pregressa, ds_doenca_presente, ds_doenca_coracao, bool_febre_reum, bool_diabete, bool_bebe_alcool, bool_fumante, ds_uso_antibiotico, ds_dific_cicatriz, ds_uso_medicamento, bool_gravidez, ds_pressao_arteral, ds_outros, ds_prescricao, id_paciente) VALUES ('$ab_prontu', '$fech_prontu', '$acomp', '$alt_prontu', '$peso_prontu', '$imc_prontu', '$tp_sang_prontu', '$doen_preg', '$doen_pres', '$doen_corac', '$feb_reum', '$diabetes', '$ing_alcool', '$fumante', '$uso_antib', '$dific_cicat', '$uso_medic', '$gravidez', '$press_art', '$outr_anot', '$prescricao', (SELECT max(id_paciente) FROM tb_paciente))") or die("Deu erro!");

    $result = mysqli_query($mysqli, "INSERT INTO tb_alergia(nm_alergia) VALUES ('$alergia')");
}

// $mysqli = $mysqli;

// $id_paciente = 1;
// $query = "SELECT p.nm_paciente, p.cd_cpf, p.cd_rg, p.sg_sexo, p.dt_nascimento, p.cd_cep, c.nm_convenio, c.nmr_carteirinha, c.ds_tipo_de_plano, c.dt_validade, c.ds_cobertura FROM tb_convenio AS c JOIN tb_paciente AS p ON p.id_convenio = c.id_convenio WHERE id_paciente = $id_paciente";
// // $query = "SELECT pr.dt_abertura, pr.dt_fechamento, pr.ds_altura, pr.ds_peso, pr.ds_imc, pr.ds_tipo_sanguineo,
// // pr.ds_doenca_pregressa, pr.ds_doenca_coracao, pr.bool_febre_reum, pr.bool_diabete, 
// //    pr.bool_bebe_alcool, pr.bool_fumante, pr.ds_uso_antibiotico, pr.ds_dific_cicatriz,
// //        pr.ds_uso_medicamento, pr.bool_gravidez, pr.ds_pressao_arteral, pr.ds_outros, 
// //            pr.ds_prescricao, p.nm_paciente, p.cd_cpf, p.cd_rg, p.sg_sexo,
// //                p.dt_nascimento, c.nm_convenio, c.ds_cobertura, c.nmr_carteirinha, c.ds_tipo_de_plano
// //                    from tb_convenio as c join tb_paciente as p on p.id_convenio = c.id_convenio
// //                        join tb_prontuario as pr on p.id_paciente = pr.id_paciente WHERE id_paciente = $id_paciente";
// $result = $mysqli->query($query);


// if ($result && $result->num_rows > 0) {
//     $usuario = $result->fetch_assoc();
// }

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
    <link rel="stylesheet" href="./src/css/prontuario.css">
    <link rel="stylesheet" href="./src/css/teste3.css">
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

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">ClinWare</span> </a>
                <div class="nav_list">

                    <a href="medico-agendados.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Agendamento</span> </a>

                    <a href="medico-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name">Histórico</span> </a>
                   
                    <a href="medico_conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Conta</span> </a>

                </div> <a href="login.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="main">

        <?php
        // Verifica se $usuario está definido e não é nulo
        if (isset($usuario) && !is_null($usuario)) {
        ?>
            <h1 class="titulo">Prontuário </h1>
            <div class="prontuario">

                <form action="medico-agenda-historico.php" method="post" id="formCEP">
                    <p>
                        <label for="q" required>Nome:</label>
                        <input class="nome" type="text" name="Nome" id="Nome" value="<?php echo $usuario['nm_paciente']; ?>" readonly>
                    </p>
                    <p>
                    <div class="input-group">
                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $usuario['dt_nascimento']; ?>" readonly>
                    </div>
                    <div class="input-group">
                        <label for="data_abertura">Data de abertura do prontuário:</label>
                        <input type="date" name="data_abertura" id="data_abertura" required>
                    </div>
                    <div class="input-group">
                        <label for="data_fechamento">Data de fechamento do prontuário:</label>
                        <input type="date" name="data_fechamento" id="data_fechamento" required>
                    </div>
                    <label for="q">Acompanhante:</label>
                    <input class="acomp" type="text" name="aco" id="aco" placeholder="">
                    <label for="q">Altura:</label>
                    <input class="alt" type="text" name="alt" id="alt" placeholder="">
                    <label for="q">Peso:</label>
                    <input class="peso" type="text" name="peso" id="peso" placeholder="">
                    <label for="q">IMC:</label>
                    <input class="imc" type="text" name="imc" id="imc" placeholder="">
                    <label for="q">Tipo Sanguineo:</label>
                    <input class="tp_sang" type="text" name="tis" id="tis" placeholder="">
                    <p>
                        <label for="sexo">Sexo:</label>
                        <input class="sexo" type="text" name="sexo" id="sexo" value="<?php echo $usuario['sg_sexo']; ?>" readonly>
                        <label for="q" required>CPF:</label>
                        <input type="tel" name="cpf" id="cpf" min="0" max="200" step="1" value="<?php echo $usuario['cd_cpf']; ?>" readonly>
                        <label for="q" required>RG:</label>
                        <input type="tel" name="rg" id="rg" min="0" max="200" step="1" value="<?php echo $usuario['cd_rg']; ?>" readonly>

                    <h3 class="titulo2">Convênio</h3>
                    <p>
                        <label for="q">Convênio:</label>
                        <input type="text" name="email" id="email" value="<?php echo $usuario['nm_convenio']; ?>" readonly>
                    <div class="input-group">
                        <label for="q">Data de validade:</label>
                        <input type="date" name="email" id="email" value="<?php echo $usuario['dt_validade']; ?>" readonly>
                    </div>
                    <label for="q">Cobertura:</label>
                    <input type="text" name="email" id="email" value="<?php echo $usuario['ds_cobertura']; ?>" readonly>
                    <label for="q">Carteirinha:</label>
                    <input type="number" name="carteirinha" id="telefone" value="<?php echo $usuario['nmr_carteirinha']; ?>" readonly>
                    <label for="q">Plano:</label>
                    <input type="text" name="email" id="email" value="<?php echo $usuario['ds_tipo_de_plano']; ?>" readonly>
                    </p>
                    <h3 class="titulo2">Endereço</h3>
                    <p>
                        <label for="q">CEP:</label>
                        <input type="tel" name="cep" id="cep" value="<?php echo $usuario['cd_cep']; ?>">
                        <button type="button" id="buscarCEP">Localizar endereço</button>
                        <label for="q">Logradouro:</label>
                        <input type="text" name="logradouro" id="logradouro" readonly>
                        <label for="q">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" readonly>
                    </p>
                    <p>
                        <label for="q">Bairro:</label>
                        <input type="tel" name="bairro" id="bairro" readonly>
                        <label for="q">Complemento:</label>
                        <input type="text" name="compl" id="compl" readonly>
                    </p>




                    <h3 class="titulo2">Anamnese</h3>
                    <div class="div-inteira">

                        <div class="divisao-esquerda">

                            <div class="doenca">
                                <h5>Doenças Pregressas</h5>
                                <p>
                                    <input type="text" name="dr" id="dr">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Alergias</h5>
                                <p>
                                    <input type="text" name="al" id="al">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Teve febre reumática</h5>
                                <p>
                                    <input type="radio" name="tfr" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="tfr" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Ingestão de álcool</h5>
                                <p>
                                    <input type="radio" name="ia" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="ia" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Uso de antibióticos</h5>
                                <p>
                                    <input type="text" name="ua" id="ua">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Uso de Medicamentos</h5>
                                <p>
                                    <input type="text" name="um" id="um">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div>
                                <h5>Pressão Arterial</h5>
                                <p>
                                    <input type="text" name="pa" id="pa">
                                    <label for="pa"></label>
                                </p>

                            </div>
                        </div>
                        <div class="divisao-direita">

                            <div class="doenca">
                                <h5>Doenças Presentes</h5>
                                <p>
                                    <input type="text" name="dp" id="dp">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Doenças no coração</h5>
                                <p>
                                    <input type="text" name="dc" id="dc">
                                    <label for="1"></label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Diabetes</h5>
                                <p>
                                    <input type="radio" name="di" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="di" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Fumante</h5>
                                <p>
                                    <input type="radio" name="fu" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="fu" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Dificuldade de cicatrização</h5>
                                <p>
                                    <input type="radio" name="ddc" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="ddc" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div class="doenca">
                                <h5>Está grávida?</h5>
                                <p>
                                    <input type="radio" name="eg" id="1" value="1">
                                    <label for="1">Sim</label>
                                </p>
                                <p>
                                    <input type="radio" name="eg" id="0" value="0">
                                    <label for="0">Não</label>
                                </p>
                            </div>
                            <div>
                                <h5>Outros</h5>
                                <p>
                                    <input type="text" name="out" id="out">
                                    <label for="out"></label>
                                </p>

                            </div>
                        </div>
                    </div>
                    <p> <label for="outros">Prescrição:</label>
                        <textarea name="outros" id="outros" cols="30" rows="10" maxlength="400"></textarea>
                    </p>
                    <button type="submit" name="enviaProntu" id="enviaProntu" href="medico-agenda-historico.php">Salvar prontuario</button>
                </form>
            </div>
        <?php
        } else {
            // Se $usuario não estiver definido ou for nulo, exibe uma mensagem de erro ou faz alguma outra ação
            echo "Usuário não encontrado ou inválido.";
        }
        ?>
    </main>
    <footer>
        <div class="sidebar-header">
            <img class="logo-img" src="./src/img/logo-clinware.png" alt="">
        </div>

    </footer>
    <script src="./src/js/menu.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#buscarCEP').click(function() {
                var cep = $('#cep').val();
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    dataType: 'json',
                    success: function(data) {
                        if (!data.erro) {
                            $('#logradouro').val(data.logradouro);
                            $('#cidade').val(data.localidade);
                            $('#bairro').val(data.bairro);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    },
                    error: function() {
                        alert('Erro ao buscar o CEP. Por favor, tente novamente.');
                    }
                });
            });
        });
    </script>
</body>

</html>