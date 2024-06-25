<form action="login.php" method="POST">
	<label for="nomePaciente">Insira seu nome:</label>
	<input type="text" name="nomePaciente" id="nomePaciente" placeholder="Nome:" required></input>
	<label for="cpf">Insira seu CPF:</label>
	<input type="text" name="cpf" id="cpf" placeholder="CPF:" required></input>
	<label for="nascimento">Insira sua data de nascimento</label>
	<input type="date" name="nascimento" id="nascimento" placeholder="Data de nascimento:"></input>
	<label for="cep">Insira seu CEP:</label>
	<input type="text" name="cep" id="cep" placeholder="CEP" required></input>
	<label>Insira seu genêro:</label>
	<input type="radio" name="sexo" value="F" id="Fem"></input>
	<label for="F">Feminino</label>
	<input type="radio" name="sexo" value="M" id="Masc"></input>
	<label for="M">Masculino</label>
	<br>
	<label for="email">Digite seu email:</label>
	<input type="email" name="email" id="email" placeholder="email:" required></input>
	<label for="senha">Insira sua senha:</label>	
	<input type="password" name="senha" placeholder="senha:"></input>
	<input type="submit" name="submit" id="submit"></input>
</form>

