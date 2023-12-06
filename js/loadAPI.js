
    const verMais = document.getElementById('load-more');
    const newsContainer = document.querySelector('.grid');

    let page = 2; // Inicializa a página para carregar mais notícias - segunda página
    const newsPerPage = 6; // Número de notícias a serem carregadas por clique

    // O async é adicionado aqui porque a função faz uso de operações assíncronas, como a chamada à API usando fetch e a espera pela resposta com await

    verMais.addEventListener('click', async function() { //  Declaração de uma função assíncrona.  indica que a função contém operações assíncronas e pode usar a palavra-chave await
         const apiUrl = `https://newsapi.org/v2/everything?q=apple&from=2023-12-05&to=2023-12-05&sortBy=popularity&page=${page}&apiKey=d2fe47092e4344a88acacc97cfb3bf04`;
        //  Cria uma URL da API NewsAPI usando a variável page para indicar a página atual.

        try {

            // Faz uma requisição à API usando a função fetch. 
            // await pausa a execução da função até que a promise seja resolvida. fetch retorna uma promise que se resolve com a resposta da requisição HTTP.
            //retorna a promise que é a eventual conclusão ou falha, significa que, quando a requisição HTTP é bem-sucedida, a Promise é resolvida
            //  com um objeto Response que contém a resposta da requisição. Se houver um erro na requisição, a Promise é rejeitada informações sobre o erro.

            const response = await fetch(apiUrl); 
            const data = await response.json();  //Converte a resposta da API para JSON. também retorna uma promessa
            console.log(data);
            if (data.articles.length > 0) { //Verifica se existem artigos na resposta da API.
                    data.articles.slice(0, newsPerPage).forEach(article => { //Se houver artigos, itera sobre os artigos usando forEach e cria elementos HTML dinâmicos para cada artigo.
                        //slice é igual o array_slice do php e aqui ele diz que a divisão do array começa no elemento 0 e vai ate o indice passado como segundo parametro, minha segunda variavel
                    const newsCard = document.createElement('div');
                    newsCard.classList.add('max-w-sm', 'mx-auto', 'bg-white', 'rounded-md', 'overflow-hidden', 'shadow-lg', 'transform', 'hover:scale-105', 'transition-transform');

                    newsCard.innerHTML = `
                    <img class="w-full h-32 object-cover" src="${article.urlToImage}" alt="${article.title}">
                    <div class="p-4">
                        <h2 class="text-md font-bold mb-2">${article.title}</h2>
                        <p class="text-gray-700 text-sm">${article.description}</p>
                    </div>
                    <div class="p-4 flex justify-end">
                        <a href="${article.url}" class="btn btn-primary text-sm" target="_blank">Read More</a>
                    </div>
                `;

                    newsContainer.appendChild(newsCard);  
                    //método JavaScript que adiciona newsCard como um filho do elemento newsContainer.
                     //Isso significa que o newsCard será inserido como filhos do newsContainer, sendo parte do conteúdo visual exibido na página.
                });

                page++;  
                // Após processar os artigos, incrementa o valor da variável page para indicar que a próxima chamada à API deve buscar a próxima página de resultados. 
            } else {
                verMais.disabled = true;
                verMais.style.display = 'none';
            }

        } catch (error) {
            console.error('Erro ao carregar notícias:', error);
        }
    });
