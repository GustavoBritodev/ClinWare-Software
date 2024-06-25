const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


// function logar() {
//     var login = document.getElementById('email').value;
//     var senha = document.getElementById('senha').value;

//     if (!login || !senha) {
//         alert('Por favor, preencha todos os campos.');
//         return;
//     }

//     if (login === "medico@medico.com" && senha === "123456") {
//         location.href ="medico_consultas.php";
//     } else if (login === "recep@recep.com" && senha === "123456") {
// 		location.href ="recepcionista.html";

//     } else {
//         alert('Conta inexistente ou senha incorreta.');
//     }
// }


// function criar() {
//     var nome = document.getElementById('criarNome').value;
//     var login = document.getElementById('criarEmail').value;
//     var senha = document.getElementById('criarSenha').value;

//     if (!nome || !login || !senha) {
//         alert('Por favor, preencha todos os campos.');
//         return;
//     }

//     if (nome === "medico" && login === "medico@medico.com" && senha === "123456") {
//         location.href ="medico_consultas.html";
//     }   else if (nome === "recepcionista" && login === "recep@recep.com" && senha === "123456") {
// 		location.href ="recepcionista.html";

//     }   else {
//         alert('Conta inexistente ou senha incorreta.');
//     }
   
//     // if ((nome === "medico" || nome === "enfermeiro" || nome === "recepcionista") &&
//     //     (login === "medico@medico.com" || login === "enf@enf.com" || login === "recep@recep.com") &&
//     //     senha === "123456") {
//     //     alert('Conta criada com sucesso');
//     // } else {
//     //     alert('Conta inexistente');
//     // }
// }


