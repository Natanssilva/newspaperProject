document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    const newsContainer = document.querySelector('.grid');

    let page = 2; // Inicializa a página para carregar mais notícias
    const newsPerPage = 6; // Número de notícias a serem carregadas por clique

    loadMoreButton.addEventListener('click', async function() {
        const apiUrl = `https://newsapi.org/v2/everything?q=apple&from=2023-12-05&to=2023-12-05&sortBy=popularity&page=${page}&apiKey=d2fe47092e4344a88acacc97cfb3bf04`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            // Verifique se há notícias para carregar
            if (data.articles.length > 0) {
                data.articles.slice(0, newsPerPage).forEach(article => {
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
                });

                page++; 
            } else {
                // Não tem mais notícias para carregar,desativar ou ocultar o botão "
                loadMoreButton.disabled = true;
                loadMoreButton.style.display = 'none';
            }

        } catch (error) {
            console.error('Erro ao carregar notícias:', error);
        }
    });
});