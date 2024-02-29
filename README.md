# NewsPaper Project Documentation

## Introdução

O projeto **NewsPaper** é uma aplicação web que oferece aos usuários a capacidade de ler notícias relacionadas à Apple de todo o mundo. Ele possui uma interface de usuário simples com funcionalidades de login, cadastro, recuperação de senha e uma página inicial dinâmica que consome a API de notícias da NewsAPI.

## Tecnologias Utilizadas

- **Backend:** PHP
- **Banco de Dados:** MySQL
- **Frontend:** HTML, CSS, JavaScript,Tailwind CSS
- ** Composer : PHP mailer

## Funcionalidades Principais

1. **Login:**
   - Permite que usuários autenticados acessem a aplicação.

2. **Cadastro:**
   - Permite que novos usuários se cadastrem na plataforma.

3. **Recuperação de Senha:**
   - Fornece aos usuários a opção de recuperar suas senhas por e-mail.

4. **Página Inicial:**
   - Exibe notícias relacionadas à Apple de todo o mundo.
   - Os usuários podem carregar mais notícias dinamicamente ao clicar em "Mostrar Mais".

## Configuração

### Requisitos do Ambiente

- PHP
- MySQL
- Servidor web (por exemplo, Apache)

### Instalação

1. Clone o repositório do projeto: `git clone [https://github.com/Natanssilva/newspaperProject.git]`
2. Importe o banco de dados fornecido (`dump-bd.sql`) para o MySQL.
3. Inicie o servidor web.

## API de Notícias

O projeto consome a API de notícias da NewsAPI para obter notícias da Apple. Certifique-se de ter uma chave de API válida para acessar os serviços da NewsAPI.

- Endpoint: `https://newsapi.org/v2/everything`
- Parâmetros:
  - `q=apple`: Termo de pesquisa para notícias relacionadas à Apple.
  - `from` e `to`: Intervalo de datas para as notícias.
  - `sortBy=popularity`: Classificação das notícias por popularidade.
  - `page`: Número da página para carregar mais notícias.
  - `apiKey`: Sua chave de API.

## Desenvolvimento

O código-fonte do projeto está organizado da seguinte forma:

- **`/src`**: Contém os arquivos PHP responsáveis pela lógica de backend e HTML.
- **`/js`**: Inclui os arquivos Javascript para lidar com Front-End.

## Contribuição

Sinta-se à vontade para contribuir para o projeto. Se encontrar problemas ou tiver sugestões, abra uma issue ou envie um pull request.


