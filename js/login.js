myForm = document
  .querySelector("#form")
  .addEventListener("submit", function enviarForm(event) {
    event.preventDefault();

    const regexLogin = /[,\;!?\[\]{}()#$%^&*]/;
    inputEmail = document.querySelector("#email");
    email = inputEmail.value;
    erroEmail = document.querySelector("#error-email");
    inputSenha = document.querySelector("#senha");
    senha = inputSenha.value;
    const validarEmail = email.length < 5 || regexLogin.test(email);
    const validarSenha = senha.length < 3;
    
    const mensagemErroEmail = validarEmail
      ? `<div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-red-700">Email Inválido.</span>
        </div>`
      : '';
    
    const mensagemErroSenha = validarSenha
      ? `<div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-red-700">Senha Inválida.</span>
        </div>`
      : '';
    
    const mensagemErro = validarEmail && validarSenha
      ? `
          <div role="alert" class="alert alert-error">
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-red-700">Senha Inválida e Email inválido.</span>
          </div>`
      : `${mensagemErroEmail}${mensagemErroSenha}`;
    
    erroEmail.innerHTML = mensagemErro;
    
    inputEmail.style.border = validarEmail ? '1px solid red' : '';
    inputSenha.style.border = validarSenha ? '1px solid red' : '';

    fetch('processa_login.php', {
        method: 'POST',
        body: new URLSearchParams(document
          .querySelector("#form"))
    })
    .then((response) => response.json())
    .then((response) =>{
        console.log(response)
    } )

  });
