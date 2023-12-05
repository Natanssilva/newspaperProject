myForm = document
  .querySelector('#form')
  .addEventListener('submit', function enviarForm(event) {
    event.preventDefault()

    const regexCadastro = /[,\;!?\[\]{}()#$%^&*]/

    const button = document.querySelector('#button-submit')
    inputNome = document.querySelector('#nome')
    inputSobrenome = document.querySelector('#sobrenome')
    nome = inputNome.value
    sobrenome = inputSobrenome.value

    inputEmail = document.querySelector('#email')
    email = inputEmail.value
    erroEmail = document.querySelector('#error-email')
    inputSenha = document.querySelector('#senha')
    senha = inputSenha.value

    const validarInfos = nome.length == 0
    const validarEmail = email.length < 5 || regexCadastro.test(email)
    const validarSenha = senha.length < 3

    const camposInvalidos = []

    if (validarInfos) {
      camposInvalidos.push('Nome')
    }

    if (validarEmail) {
      camposInvalidos.push('Email')
    }

    if (validarSenha) {
      camposInvalidos.push('Senha')
    }

    const mensagemErro =
      camposInvalidos.length > 0
        ? `
          <div role="alert" class="alert alert-error">
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-red-700">${camposInvalidos.join(
                ', '
              )} inválido(s).</span>
          </div>`
        : ''

    erroEmail.innerHTML = mensagemErro

    inputNome.style.border = validarInfos ? '1px solid red' : ''
    inputEmail.style.border = validarEmail ? '1px solid red' : ''
    inputSenha.style.border = validarSenha ? '1px solid red' : ''

    if (!mensagemErro) {
      button.setAttribute('disabled', 'true')
      button.innerHTML = `
                        <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                      
                        </svg>`

      fetch('processar_cadastro.php', {
        method: 'POST',
        body: new FormData(document.querySelector('#form')), //pegar os dados do form
      })
        .then((response) => response.json())
        .then((response) => {
          if (response.status == 'true') {
            setTimeout(function removerAnimação() {
              //função callback, ou seja uma função passada como argumento
              // tirando a animação
              button.innerHTML = 'Cadastre-se'
              button.removeAttribute('disabled')

              // Enviar o formulário

              document.querySelector('#form').submit()
              window.location.href = response.redirect //redirecionando pra home (página do usuario)
            }, 2800)
          } else {
            setTimeout(function erroDb() {
              //função callback, ou seja uma função passada como argumento
              // tirando a animação
              button.innerHTML = 'Cadastre-se'
              button.removeAttribute('disabled')

              erroEmail.innerHTML = `<div role="alert" class="alert alert-error">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <span class="text-red-700">Login não existe no banco de dados</span>
                                      </div>`
            }, 2000)
          }
        })
    }
  })
