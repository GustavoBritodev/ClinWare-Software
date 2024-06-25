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
                <div class="nav_list"> <a href="medico_prontuario.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Prontuário</span> </a>

                    <a href="medico-agendados.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Agendamento</span> </a>

                    <a href="medico-agenda-historico.php" class="nav_link"> <i class="bi bi-clock-history"></i></i> <span class="nav_name">Histórico</span> </a>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Arquivados</span> </a> -->
                    <!-- <a href="#" class="nav_link"> <span class="nav_name"></span> </a> -->
                    <a href="medico_conta.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Conta</span> </a>

                </div> <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
            </div>
        </nav>
    </div>

    <main class="main">


        <h1 class="titulo">Prontuário </h1>


        <form action="" method="get">
            <p>
                <label for="q" required>Nome:</label>
                <input type="text" name="Nome" id="Nome" placeholder="">
            </p>
            <p>
                <label for="q">Data de nascimento:</label>
                <input type="date" name="Data" id="Data" placeholder="">
            </p>
            <label for="q">Cidade</label>
            <input type="text" name="cdd" id="cdd" placeholder="">
            <label for="estados">Estados:</label>
            <select id="UF" name="UF">
                <option value="">Selecione</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
            </select>
            </p>
            <h4>Sexo:</h3>
                <p>
                    <input type="radio" name="sexo" id="masc" value="masc">
                    <label for="masc">Masculino</label>
                </p>

                <p>
                    <input type="radio" name="sexo" id="fem" value="fem">
                    <label for="fem">Feminino</label>

                </p>

                <p>
                    <label for="q" required>CPF:</label>
                    <input type="tel" name="cpf" id="cpf" min="0" max="200" step="1" placeholder="">
                </p>
                <p>
                    <label for="q" required>RG:</label>
                    <input type="tel" name="rg" id="rg" min="0" max="200" step="1" placeholder="">
                </p>
                <p>
                    <label for="q">Emissor:</label>
                    <input type="text" name="email" id="email" placeholder="">

                <h3>Convênio:</h3>
                <p>
                    <label for="q">Convênio:</label>
                    <input type="text" name="email" id="email" placeholder="Convênio...">
                </p>
                <p>
                    <label for="q">Carteirinha:</label>
                    <input type="number" name="carteirinha" id="telefone" placeholder="">
                </p>
                <p>
                    <label for="q">Plano:</label>
                    <input type="text" name="email" id="email" placeholder="">
                </p>
                <h3>Endereço:</h3>
                <p>
                    <label for="q">CEP:</label>
                    <input type="tel" name="cep" id="cep" placeholder="" required> <button>Localizar endereço</button>
                </p>
                <p>
                    <label for="q">Logradouro:</label>
                    <input type="text" name="logra" id="logra" placeholder="">
                    <label for="q">Número:</label>
                    <input type="tel" name="n-logra" id="n-logra" placeholder="">
                </p>
                <p>
                    <label for="q">Complemento:</label>
                    <input type="text" name="bairro" id="bairro" placeholder="">
                </p>
                <p>
                    <label for="q">Cidade</label>
                    <input type="text" name="cdd" id="cdd" placeholder="">
                </p>




                <h3>Anamnese</h3>
                <div class="div-inteira">

                    <div class="divisao-esquerda">

                        <div class="doenca">
                            <h5>Doenças Pregressas</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Doenças Pregressas</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Alergias</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Teve febre reumática</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Ingestão de álcool</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Uso de antibióticos</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Uso de Medicamentos</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Pressão Arterial</h5>
                            <p>
                                <input type="text" name="sexo" id="masc" value="">
                                <label for="masc"></label>
                            </p>

                        </div>
                    </div>
                    <div class="divisao-direita">

                        <div class="doenca">
                            <h5>Doenças Presentes</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Doenças no coração</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Diabetes</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Fumante</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Dificuldade de cicatrização</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Está grávida?</h5>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Sim</label>
                            </p>
                            <p>
                                <input type="radio" name="sexo" id="masc" value="masc">
                                <label for="masc">Não</label>
                            </p>
                        </div>
                        <div class="doenca">
                            <h5>Outros</h5>
                            <p>
                                <input type="text" name="sexo" id="masc" value="">
                                <label for="masc"></label>
                            </p>

                        </div>
                    </div>
                </div>
                <p> <label for="outros">Prescrição: <p></p></label>
                    <textarea name="outros" id="outros" cols="30" rows="10" maxlength="400"></textarea>
                </p>
        </form>
    </main>
    <footer>
        <div class="sidebar-header">
            <img class="logo-img" src="./src/img/logo-clinware.png" alt="">

        </div>

    </footer>
    <script src="./src/js/menu.js"></script>
</body>

</html>