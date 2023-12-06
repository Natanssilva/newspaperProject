

    const logoutButton = document.getElementById('button-logout');

    logoutButton.addEventListener('click', function () {
        // Faz uma requisição assíncrona para o servidor para destruir a sessão
        fetch('logout.php', {
            method: 'POST'
        })
        .then(response => {
            if (response.ok) {
                // Redireciona para a página de login ou outra página apropriada
                window.location.href = 'login.php';
            } else {
                // Lida com erros ou exibe mensagens de erro
                console.error('Erro ao fazer logout:', response.statusText);
            }
        })
        .catch(error => {
            console.error('Erro ao fazer logout:', error);
        });
    });

