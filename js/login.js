myForm = document.querySelector('#form').addEventListener('submit', function enviarForm(event){
    event.preventDefault();

    const regexLogin = /[,\;!?\[\]{}()#$%^&*]/;
    inputEmail = document.querySelector('#email');
    email = inputEmail.value;
    erroEmail = document.querySelector('.error-message');
    erroSenha = document.querySelector('.erro-login');
    inputSenha = document.querySelector('#senha');
    senha = inputSenha.value;

    if (email.length <  5 || regexLogin.test(email)) {
        erroEmail.innerHTML = "Email inválido";
        inputEmail.style.border = "1px solid red";
    }else{
        erroEmail.innerHTML = "";
        inputEmail.style.border = "";
    }

    if (senha.length < 3) {
        erroSenha.innerHTML = "Senha inválida";
        inputSenha.style.border = "1px solid red";
    } else {
        erroSenha.innerHTML = "";
        inputSenha.style.border = "";
    }

});