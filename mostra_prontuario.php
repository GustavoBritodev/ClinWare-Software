<?php
session_start();
include_once('config.php');

// Verificar se o ID do paciente foi passado via GET
if (isset($_GET['id_paciente'])) {
    $pacienteId = $_GET['id_paciente'];

    // Consulta SQL para obter os dados do prontuário do paciente
    $queryProntuario = "SELECT 
                prontuario.*,
                paciente.nm_paciente, 
                paciente.cd_cpf, 
                paciente.cd_rg,
                paciente.dt_nascimento, 
                paciente.sg_sexo, 
                paciente.cd_cep,
                convenio.nm_convenio, 
                convenio.dt_validade,
                convenio.ds_cobertura,
                convenio.nmr_carteirinha,
                convenio.ds_tipo_de_plano
              FROM 
                tb_prontuario prontuario
                INNER JOIN tb_paciente paciente ON prontuario.id_paciente = paciente.id_paciente
                LEFT JOIN tb_convenio convenio ON paciente.id_convenio = convenio.id_convenio
              WHERE 
                prontuario.id_paciente = {$pacienteId}";

    // Executar a consulta do prontuário
    $resultProntuario = mysqli_query($mysqli, $queryProntuario);

    // Verificar se o prontuário foi encontrado
    if ($resultProntuario && mysqli_num_rows($resultProntuario) > 0) {
        $prontuario = mysqli_fetch_assoc($resultProntuario);
    } else {
        // Caso não encontre prontuário, pode redirecionar ou exibir uma mensagem
        echo "Prontuário não encontrado para este paciente.";
        exit; // ou redirecionar para uma página de erro
    }
} else {
    // Se o ID do paciente não foi passado via GET, redirecionar ou exibir mensagem de erro
    echo "ID do paciente não especificado.";
    exit; // ou redirecionar para uma página de erro
}

if (isset($_POST['enviaProntu'])) {
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

    $result = mysqli_query($mysqli, "INSERT INTO tb_prontuario(dt_abertura, dt_fechamento, nm_acompanhante, ds_altura, ds_peso, ds_imc, ds_tipo_sanguineo, ds_doenca_pregressa, ds_doenca_presente, ds_doenca_coracao, bool_febre_reum, bool_diabete, bool_bebe_alcool, bool_fumante, ds_uso_antibiotico, ds_dific_cicatriz, ds_uso_medicamento, bool_gravidez, ds_pressao_arteral, ds_outros, ds_prescricao, id_paciente) VALUES ('$ab_prontu', '$fech_prontu', '$acomp', '$alt_prontu', '$peso_prontu', '$imc_prontu', '$tp_sang_prontu', '$doen_preg', '$doen_pres', '$doen_corac', '$feb_reum', '$diabetes', '$ing_alcool', '$fumante', '$uso_antib', '$dific_cicat', '$uso_medic', '$gravidez', '$press_art', '$outr_anot', '$prescricao', $pacienteId)") or die("Erro ao inserir prontuário!");

    $alergia = mysqli_real_escape_string($mysqli, $alergia);
    $resultAlergia = mysqli_query($mysqli, "INSERT INTO tb_alergia(nm_alergia) VALUES ('$alergia')");
    if ($resultAlergia) {
        echo "Alergia inserida com sucesso!";
    } else {
        echo "Erro ao inserir alergia!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Prontuário</title>
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
            max-width: 100%;
        }

        .card h3 {
            font-size: 16px;
            margin-bottom: 12px;
            color: #333;
            max-width: 100%;
        }

        .card p {
            margin-bottom: 8px;
        }

        .body {
            max-width: 100%;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
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
                        <span class="nav_name">Agendamento</span>
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
                <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="main">
        <h1 class="titulo">Prontuário</h1>
        <div class="prontuario">
            <form action="medico_prontuario.php?id_paciente=<?php echo $pacienteId; ?>" method="post" id="formProntuario">
                <div class="input-group">
                    <label for="Nome">Nome:</label>
                    <input class="nome" type="text" name="Nome" id="Nome" value="<?php echo $prontuario['nm_paciente']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="data_nascimento">Data de nascimento:</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $prontuario['dt_nascimento']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="data_abertura">Data de abertura do prontuário:</label>
                    <input type="datetime" name="data_abertura" id="data_abertura" value="<?php echo $prontuario['dt_abertura']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="data_fechamento">Data de fechamento do prontuário:</label>
                    <input type="datetime" name="data_fechamento" id="data_fechamento" value="<?php echo $prontuario['dt_fechamento']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="aco">Acompanhante:</label>
                    <input class="acomp" type="text" name="aco" id="aco" value="<?php echo $prontuario['nm_acompanhante']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="alt">Altura:</label>
                    <input class="alt" type="text" name="alt" id="alt" value="<?php echo $prontuario['ds_altura']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="peso">Peso:</label>
                    <input class="peso" type="text" name="peso" id="peso" value="<?php echo $prontuario['ds_peso']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="imc">IMC:</label>
                    <input class="imc" type="text" name="imc" id="imc" value="<?php echo $prontuario['ds_imc']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="tis">Tipo Sanguineo:</label>
                    <input class="tp_sang" type="text" name="tis" id="tis" value="<?php echo $prontuario['ds_tipo_sanguineo']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="sexo">Sexo:</label>
                    <input class="sexo" type="text" name="sexo" id="sexo" value="<?php echo $prontuario['sg_sexo']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="cpf">CPF:</label>
                    <input type="tel" name="cpf" id="cpf" value="<?php echo $prontuario['cd_cpf']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="rg">RG:</label>
                    <input type="tel" name="rg" id="rg" value="<?php echo $prontuario['cd_rg']; ?>" readonly>
                </div>
                <div class="input-group">
                    <label for="email">Convênio:</label>
                    <input type="text" name="email" id="email" value="<?php echo $prontuario['nm_convenio']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label for="q">Cobertura:</label>
                    <input type="text" name="email" id="email" value="<?php echo $prontuario['ds_cobertura']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label for="q">Carteirinha:</label>
                    <input type="number" name="carteirinha" id="telefone" value="<?php echo $prontuario['nmr_carteirinha']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label for="q">Plano:</label>
                    <input type="text" name="email" id="email" value="<?php echo $prontuario['ds_tipo_de_plano']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label for="q">CEP:</label>
                    <input type="tel" name="cep" id="cep" value="<?php echo $prontuario['cd_cep']; ?>" readonly>
                    <!-- <button type="button" id="buscarCEP">Localizar endereço</button> -->
                </div>




                <h3 class="titulo2">Anamnese</h3>
                <div class="div-inteira">

                    <div class="divisao-esquerda">

                        <div class="doenca">
                            <h5>Doenças Pregressas</h5>
                            <p>
                                <input type="text" name="dr" id="dr" value="<?php echo $prontuario['ds_doenca_pregressa']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div>
                        <!-- <div class="doenca">
                            <h5>Alergias</h5>
                            <p>
                                <input type="text" name="al" id="al"  value="<?php echo $prontuario['ds_doenca_pregressa']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div> -->
                        <div class="doenca">
                            <h5>Teve febre reumática</h5>
                            <?php
                            // Supondo que $prontuario['bool_febre_reum'] tenha o valor 0 ou 1 do banco de dados
                            $valor_febre_reum = $prontuario['bool_febre_reum'] == 1 ? 'Sim' : 'Não';
                            ?>

                            <p>
                                <input type="text" name="tfr" id="1" value="<?php echo $valor_febre_reum; ?>" readonly>
                            </p>

                        </div>
                        <?php
                        // Supondo que $prontuario['bool_bebe_alcool'] tenha o valor 0 ou 1 do banco de dados
                        $bebe_alcool = $prontuario['bool_bebe_alcool'] == 1 ? 'Sim' : 'Não';
                        ?>
                        <div class="doenca">
                            <h5>Ingestão de álcool</h5>
                            <p>
                                <input type="text" name="ia" id="alcool" value="<?php echo $bebe_alcool; ?>" readonly>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Uso de antibióticos</h5>
                            <p>
                                <input type="text" name="ua" id="ua" value="<?php echo $prontuario['ds_uso_antibiotico']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Uso de Medicamentos</h5>
                            <p>
                                <input type="text" name="um" id="um" value="<?php echo $prontuario['ds_uso_medicamento']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div>
                        <div>
                            <h5>Pressão Arterial</h5>
                            <p>
                                <input type="text" name="pa" id="pa" value="<?php echo $prontuario['ds_pressao_arteral']; ?>" readonly>
                                <label for="pa"></label>
                            </p>

                        </div>
                        <div class="input-group">
                            <h3>Prescrição:</h3>
                            <textarea><?php echo $prontuario['ds_prescricao']; ?></textarea>
                        </div>
                    </div>
                    <div class="divisao-direita">

                        <div class="doenca">
                            <h5>Doenças Presentes</h5>
                            <p>
                                <input type="text" name="dp" id="dp" value="<?php echo $prontuario['ds_doenca_presente']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Doenças no coração</h5>
                            <p>
                                <input type="text" name="dc" id="dc" value="<?php echo $prontuario['ds_doenca_coracao']; ?>" readonly>
                                <label for="1"></label>
                            </p>
                        </div>
                        <?php
                        // Supondo que $prontuario contenha os valores das condições médicas
                        $diabetes = $prontuario['bool_diabete'] == 1 ? 'Sim' : 'Não';
                        $fumante = $prontuario['bool_fumante'] == 1 ? 'Sim' : 'Não';
                        $dificuldade_cicatrizacao = $prontuario['ds_dific_cicatriz'] == 1 ? 'Sim' : 'Não';
                        $gravida = $prontuario['bool_gravidez'] == 1 ? 'Sim' : 'Não';
                        ?>
                        <div class="doenca">
                            <h5>Diabetes</h5>
                            <p>
                                <input type="text" name="di" id="diabetes" value="<?php echo $diabetes; ?>" readonly>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Fumante</h5>
                            <p>
                                <input type="text" name="fu" id="fumante" value="<?php echo $fumante; ?>" readonly>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Dificuldade de cicatrização</h5>
                            <p>
                                <input type="text" name="ddc" id="dificuldade_cicatrizacao" value="<?php echo $dificuldade_cicatrizacao; ?>" readonly>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Está grávida?</h5>
                            <p>
                                <input type="text" name="eg" id="gravida" value="<?php echo $gravida; ?>" readonly>
                            </p>
                        </div>
                        <!-- <div></div> -->



                        <div class="input-group">
                            <label for="observacoes">Observações:</label>
                            <textarea name="observacoes" id="observacoes" rows="5" readonly><?php echo $prontuario['ds_outros']; ?></textarea>
                        </div>



                        
                        
                   
                    </form>
                </div>
    </main>

    <script src="./src/js/menu.js"></script>
</body>

</html>