<?php

include_once('config.php');

if($mysqli && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['user'])){

	if(strlen($_POST['email']) == 0){
		echo "Preencha seu email";
	} else if(strlen($_POST['senha']) == 0){
		echo "Preencha sua senha";
	} else{
		$email = $mysqli->real_escape_string($_POST['email']);
		$senha = $mysqli->real_escape_string($_POST['senha']);
		$user = $mysqli->real_escape_string($_POST['user']);

		$sql_code = "SELECT * FROM tb_usuario WHERE nm_login = '$email' AND cd_senha = '$senha' AND cd_tipo = '$user'";

		$sql_query = $mysqli->query($sql_code) or die("Falha na execução".$mysqli->error);

		$quantidade = $sql_query->num_rows;

		if($quantidade == 1){
			$usuario = $sql_query->fetch_assoc();
            session_start();
            $_SESSION['id_usuario'] = $usuario['id_usuario'];

			switch ($user) {
			     case '1':
			     
			         header("Location: medico-agendados.php");
			         break;
			     case '2':
			        
			         header("Location: recepcionista-agendados.php");
			         break;
			     case '3':
			        
			         header("Location: pagina_paciente.php");
			         break;
			     default:
			         
			         echo "Tipo de usuário inválido.";
			         break;
			 }
		}
	}

}

if (isset($_POST['cadMedico'])) {


	include_once('config.php');

	$nomeMed = $_POST['nomeMedico'];
	$cpfMed = $_POST['cpf'];
	$crmMed = $_POST['crm'];
    $rgMed = $_POST['rg'];
	$uf_crmMed = $_POST['ufcrm'];
	$especMed = $_POST['espec'];
	$clncMed = $_POST['clnc'];
	$emailMed = $_POST['email'];
	$senhaMed = $_POST['senha'];
	
	$result = mysqli_query($mysqli, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$emailMed', '$senhaMed', '1')");

    $result = mysqli_query($mysqli, "INSERT INTO tb_especialidades(nm_especialidade, id_clinicas) VALUES ('$especMed', (SELECT max(id_clinicas) FROM tb_clinicas))");

	$result = mysqli_query($mysqli, "INSERT INTO tb_medico(cd_crm, cd_cpf, nm_medico, cd_rg, uf_crm, id_usuario, id_especialidade) VALUES ('$crmMed', '$cpfMed', '$nomeMed', '$rgMed', '$uf_crmMed', (SELECT max(id_usuario) FROM tb_usuario), (SELECT max(id_especialidade) FROM tb_especialidades))") OR die("Deu erro!");	

}

if (isset($_POST['cadRecep'])) {


	include_once('config.php');

	$nomeRecep = $_POST['nomeRecep'];
	$cpfRecep = $_POST['cpf'];
    $rgRecep = $_POST['rg'];
	$emailRecep = $_POST['email'];
	$senhaRecep = $_POST['senha'];
	
	
		$result = mysqli_query($mysqli, "INSERT INTO tb_usuario(nm_login, cd_senha, cd_tipo) VALUES ('$emailRecep', '$senhaRecep', '2')");

	$result = mysqli_query($mysqli, "INSERT INTO tb_recepcionista(nm_recepcionista, cd_cpf, cd_rg, id_usuario) VALUES ('$nomeRecep', '$cpfRecep', '$rgRecep', (SELECT max(id_usuario) FROM tb_usuario))") OR die("Deu erro!");
	
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Inclua o Bootstrap Icons CSS (substitua pelo caminho correto) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Inclua o seu estilo CSS -->
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="#">
                <img src="src/img/logo-clinware.png" alt="">
            </a>
        </div>
    </div>

    <div class="login_body">
        <div class="login_box">
            <h2>Acessar</h2>

            <form action="login.php" method="post">
                <div class="input_box">
                    <input type="text" name="email" placeholder="Usuário">
                </div>
                <div class="input_box">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                </div>
                <p>Selecione o tipo de conta:</p>
                <div class="radio-inputs">
                    <label class="radio">
                        <input type="radio" name="user" value="1" id="1" checked="">
                        <span class="name">Médico</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="user" value="2" id="2">
                        <span class="name">Recepcionista</span>
                    </label>
                </div>
                <input class="submit botao" type="submit" id="login" name="login" value="Entrar" />
            </form>

            <div class="support">
                <div class="remember">
                    <p><input type="checkbox" style="margin: 0;padding: 0; height: 13px;"></p>
                    <p>Lembre-se de mim</p>
                </div>
                <div class="help">
                    <a href="#">
                        Precisa de ajuda?
                    </a>
                </div>
            </div>

            <div class="login_footer">
                <div class="sign_up">
                    <p>Cadastre-se:</p>
                    <form>
                        <button class="botao" formaction="./cadMedico.php">Cadastre um médico</button>
                    </form>
                    <form>
                        <button class="botao" formaction="./cadRecep.php">Cadastre uma recepcionista</button>
                    </form>
                </div>
                <div class="terms">
                    <p>Esta página é protegida pelo Google reCAPTCHA para garantir que você não é um robô. <a href="#">Saiba mais</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua o JavaScript -->
    <script>
        // JavaScript para alternar visibilidade da senha
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#senha');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>
