<?php

include_once('config.php');

if (isset($_POST['submit'])) {
    $nomePac = $_POST['nomePaciente'];
    $cpfPac = $_POST['cpf'];
    $dtNasc = $_POST['nascimento'];
    $cepPac = $_POST['cep'];
    $genero = $_POST['sexo'];
    $rgPac = $_POST['errege'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nmConvenio = $_POST['nomeConvenio'];
    $nmrCarteirinha = $_POST['carteirinha'];
    $validadeConvenio = $_POST['dtValidade'];
    $coberturaConvenio = $_POST['coberturaConvenio'];
    $planoConvenio = $_POST['tpPlano'];

    $errors = [];

    // // Validação da data de nascimento
    // $nascimentoDate = new DateTime($dtNasc);
    // $currentDate = new DateTime();
    // if ($nascimentoDate > $currentDate) {
    //     $errors[] =  "<script language='javascript' type='text/javascript'>alert('Você colocou a data de nascimento futura.'); window.location.href='recepcionista.php';</script>";
    // }

    // // Validação da data de validade
    // $dtValidadeDate = new DateTime($validadeConvenio);
    // if ($dtValidadeDate < $currentDate) {
    //     $errors[] = "<script language='javascript' type='text/javascript'>alert('A validade está expirada.'); window.location.href='recepcionista.php';</script>";
    // }

    if (empty($errors)) {
        // Aqui você pode adicionar o código para processar e salvar os dados no banco
        $result1 = mysqli_query($mysqli, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$email', '$senha', '3')");
        $result2 = mysqli_query($mysqli, "INSERT INTO tb_convenio(nm_convenio, dt_validade, ds_cobertura, ds_tipo_de_plano, nmr_carteirinha) VALUES ('$nmConvenio', '$validadeConvenio', '$coberturaConvenio', '$planoConvenio', '$nmrCarteirinha')");
        $result3 = mysqli_query($mysqli, "INSERT INTO tb_paciente(nm_paciente, cd_cpf, dt_nascimento, cd_cep, sg_sexo, ds_email, cd_rg, id_usuario, id_convenio) VALUES ('$nomePac', '$cpfPac', '$dtNasc', '$cepPac', '$genero', '$email', '$rgPac', (SELECT max(id_usuario) FROM tb_usuario), (SELECT max(id_convenio) FROM tb_convenio))") or die("Deu erro!");
        
        if ($result1 && $result2 && $result3) {
          header("Location: recepcionista-marcar.php");
        } else {
            echo "Erro ao realizar o cadastro.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
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
      
        .button {
            color: #fff;
            font-family: inherit;
            display: inline-block;
            width: 5rem;
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

        .button:before {
            content: "";
            position: absolute;
            z-index: -1;
            background: var(--color);
            height: 150px;
            width: 200px;
            border-radius: 50%;
        }

        .button:hover {
            color: #fff;
        }

        .button:before {
            top: 100%;
            left: 100%;
            transition: all .7s;
        }

        .button:hover:before {
            top: -30px;
            left: -30px;
        }

        .button:active:before {
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

    <main class="container">

        <div class="text">
            Cadastro
        </div>
        <form id="cadastroForm" action="recepcionista-marcar.php" method="post">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="nomePaciente" required>
                    <div class="underline"></div>
                    <label for="">Nome completo:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="cpf" id="cpf" maxlength="14" required>
                    <div class="underline"></div>
                    <label for="">CPF:</label>
                </div>

            </div>
            <div class="form-row">
                <label for="">Gênero:</label>
                <div class="input-data">
                <select name="sexo" required>
                        <option value="Homem cisgênero">Homem cisgênero</option>
                        <option value="Homem transgênero">Homem transgênero</option>
                        <option value="Mulher cisgênero">Mulher cisgênero</option>
                        <option value="Mulher transgênero">Mulher transgênero</option>
                        <option value="Gênero não-binário">Gênero não-binário</option>
                        <option value="Agênero">Agênero</option>
                        <option value="Gênero-fluido">Gênero-fluido</option>
                    </select>
                    <div class="underline"></div>
                </div>
                <div class="input-data">
                    <input type="text" name="cep" id="cep" maxlength="9" required>
                    <div class="underline"></div>
                    <label for="">CEP:</label>
                </div>
                <label for="">Data de nascimento:</label>
                <div class="input-data">
                    <input type="date" name="nascimento" id="nascimento" required>
                    <div class="underline"></div>
                </div>

            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="errege" id="rg" maxlength="12" required>
                    <div class="underline"></div>
                    <label for="">RG:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="email" required>
                    <div class="underline"></div>
                    <label for="">Email:</label>
                </div>
                <div class="input-data">
                    <input type="password" name="senha" required>
                    <div class="underline"></div>
                    <label for="">Senha:</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="nomeConvenio" required>
                    <div class="underline"></div>
                    <label for="">Nome do convênio:</label>
                </div>
                <div class="input-data">
                    <input type="text" name="carteirinha" required>
                    <div class="underline"></div>
                    <label for="">Carteirinha:</label>
                </div>
                <label for="">Cobertura:</label>
                <div class="input-data">
                    <select name="coberturaConvenio" required>
                        <option value="Ambulatorial">Ambulatorial</option>
                        <option value="Hospitalar com obstetrícia">Hospitalar com obstetrícia</option>
                        <option value="Hospitalar sem obstetrícia">Hospitalar sem obstetrícia</option>
                        <option value="Odontológico">Odontológico</option>
                    </select>
                    <div class="underline"></div>
                </div>
            </div>

            <div class="form-row">
                <label for="">Data de validade:</label>
                <div class="input-data">
                    <input type="date" name="dtValidade" id="dtValidade" required>
                    <div class="underline"></div>
                </div>
                <label for="">Tipo de Plano:</label>
                <div class="input-data">
                    <select name="tpPlano" required="">
                        <option value="Individual">Individual</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Coletivo">Coletivo</option>
                        <option value="MEI - Microempreendedor Individual">MEI - Microempreendedor Individual</option>
                    </select>
                    <div class="underline"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="input-data textarea">
                    <textarea rows="8" cols="80"></textarea>
                    <br />
                    <div class="underline"></div>
                    <label for="">Observação:</label>
                    <br />


                    <div class="form-row submit-btn">

                        <input class="button" type="submit" name="submit" id="submitBtn" value="Cadastrar">

                    </div>


        </form>

    </main>
    <script src="./src/js/menu.js"></script>

    <script>
        // Validação de data no lado do cliente
        // document.getElementById('cadastroForm').addEventListener('submit', function(event) {
        //     const nascimentoInput = document.getElementById('nascimento');
        //     const validadeInput = document.getElementById('dtValidade');
        //     const currentDate = new Date().toISOString().slice(0, 10);

        //     if (nascimentoInput.value > currentDate) {
        //         alert('A data de nascimento não pode ser futura.');
        //         event.preventDefault();
        //     }

        //     if (validadeInput.value < currentDate) {
        //         alert('A validade do plano de saúde está vencida.');
        //         event.preventDefault();
        //     }
        // });

        // Máscaras de entrada
        const inputCpf = document.querySelector("#cpf")
        inputCpf.addEventListener('keypress', () => {
            let cpfLength = inputCpf.value.length
            if (cpfLength === 3 || cpfLength === 7) {
                inputCpf.value += '.'
            } else if (cpfLength === 11) {
                inputCpf.value += '-'
            }
        })

        const inputCEP = document.querySelector("#cep")
        inputCEP.addEventListener('keypress', () => {
            let cepLength = inputCEP.value.length
            if (cepLength === 5) {
                inputCEP.value += '-'
            }
        })

        const inputRG = document.querySelector("#rg")
        inputRG.addEventListener('keypress', () => {
            let RgLength = inputRG.value.length
            if (RgLength === 2 || RgLength === 6) {
                inputRG.value += '.'
            } else if (RgLength === 10) {
                inputRG.value += '-'
            }
        })
    </script>
</body>

</html>
