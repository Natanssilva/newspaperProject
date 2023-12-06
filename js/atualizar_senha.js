let formAtualizar = document
  .querySelector('#formAtualizar')
  .addEventListener('submit', function recuperarSenha(event) {
    event.preventDefault()

    let buttonAtualizar = document.querySelector('#buttonAtualizaSenha')
    let inputSenhaAtualizada = document.querySelector('#senha')
    let SenhaAtualizada = inputSenhaAtualizada.value

    let error = document.querySelector('#error-div')

    const verificarCampo =
      SenhaAtualizada.trim() === '' || SenhaAtualizada.length <= 3

    if (verificarCampo) {
      inputSenhaAtualizada.style.border = '1px solid red'
      error.innerHTML = `<div role="alert" class="alert alert-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-red-700">Senha Inválida.</span>
                            </div>`
    } else {
      inputSenhaAtualizada.style.border = ''
      error.innerHTML = ''
    }

    //cria um novo objeto URLSearchParams que representa a parte da consulta (query string) da URL atual.

    const urlParams = new URLSearchParams(window.location.search) //window.location.search pega o parametro da url ou seja apos o ? (query string)
    const chaveRecuperacao = urlParams.get('chave') //pega com get o valor chave da url

    // Adicione a chaveRecuperacao aos dados do formulário
    const formData = new FormData(document.querySelector('#formAtualizar'))
    formData.append('chave', chaveRecuperacao)

    if (!verificarCampo) {
      buttonAtualizar.setAttribute('disabled', 'true')
      buttonAtualizar.innerHTML = `
                              <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                            
                              </svg>`

      fetch('processar_atualizar_senha.php', {
        method: 'POST',
        body: formData, //pegar os dados do form
      })
        .then((response) => response.json())
        .then((response) => {
          if (response.status == 'true') {
            setTimeout(function removerAnimação() {
              buttonAtualizar.innerHTML = 'Atualizar'
              buttonAtualizar.removeAttribute('disabled')
              error.innerHTML = `<div role="alert" class="alert alert-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>${response.message}!</span>
                                </div>`

              // window.location.href = response.redirect
            }, 2800)
          } else {
            setTimeout(function erroDb() {
              buttonAtualizar.innerHTML = 'Enviar'
              buttonAtualizar.removeAttribute('disabled')

              error.innerHTML = `<div role="alert" class="alert alert-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>${response.message}.</span>
                                </div>`
            }, 3000)
          }
        })
    }
  })
