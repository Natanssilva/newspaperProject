myForm = document
  .querySelector("#form")
  .addEventListener("submit", function enviarForm(event) {
    event.preventDefault();

    const button = document.querySelector('#button-submit');
    const regex = /[,\;!?\[\]{}()#$%^&*]/;
    inputEmail = document.querySelector("#email");
    email = inputEmail.value;
    erroEmail = document.querySelector("#error-email");
    const validarEmail = email.length < 5 || regex.test(email);
    
    const mensagemErroEmail = validarEmail
      ? `<div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-red-700">Email Inválido.</span>
        </div>`
      : '';
    
    erroEmail.innerHTML = mensagemErroEmail;
    inputEmail.style.border = validarEmail ? '1px solid red' : '';

    // Mensagem de sucesso em um div adicional
    const feedback = document.querySelector("#sucess-div");

    if (!mensagemErroEmail) {
      button.setAttribute('disabled', 'true')
      button.innerHTML = `
                        <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                      
                        </svg>`

      fetch('processar_recup_senha.php', {
        method: 'POST',
        body: new FormData(document.querySelector('#form')), // Pegar os dados do form
      })
        .then((response) => response.json())
        .then((response) => {
          if (response.status == 'true') {
            // Exibir mensagem de sucesso
            feedback.innerHTML = `<div role="alert" class="alert alert-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-green-700">Email enviado com chave de recuperação!</span>
                                  </div>`;

            // Aguarde um momento antes de remover a mensagem de sucesso e redirecionar
            setTimeout(function removerAnimação() {
              feedback.innerHTML = ''; // Remover a mensagem de sucesso
              button.innerHTML = 'Atualizar'
              button.removeAttribute('disabled')
              document.querySelector('#form').submit()
              window.location.href = response.redirect; // Redirecionando para a home (página do usuário)
            }, 2800);
          }else if(response.status == 'E2'){
            setTimeout(function erroDb() {
              button.innerHTML = 'Atualizar'
              button.removeAttribute('disabled')
              feedback.innerHTML = `<div role="alert" class="alert alert-error">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <span class="text-red-700">${response.message}</span>
                                      </div>`;
            }, 2000);
          }
          
          
          else {
            setTimeout(function erroDb() {
              button.innerHTML = 'Atualizar'
              button.removeAttribute('disabled')
              feedback.innerHTML = `<div role="alert" class="alert alert-error">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <span class="text-red-700">Login não existe no banco de dados</span>
                                      </div>`;
            }, 2000);
          }
        });
    }
  });