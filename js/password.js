let hidePassword = document.querySelector('.hide-password');
let showPassword = document.querySelector('.show-password');
let inputSenha = document.querySelector('#senha');

hidePassword.addEventListener('click', function mostrarSenha (){

    inputSenha.type = 'text';
    hidePassword.classList.add('hidden');
    showPassword.classList.remove('hidden');
});

showPassword.addEventListener('click', function ocultarSenha (){

    inputSenha.type = 'password';
    showPassword.classList.add('hidden');
    hidePassword.classList.remove('hidden');
});

