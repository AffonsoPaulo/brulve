# Projeto Brulve

Este é um projeto desenvolvido com PHP, SQL, JavaScript, NPM e Composer.

## Instalação

Siga os passos abaixo para instalar e configurar o projeto em seu ambiente local.

1. Clone o repositório para sua máquina local.

2. Navegue até o diretório do projeto e execute os seguintes comandos para instalar as dependências necessárias:

\`\`\`bash
composer install
npm install
npm run build
\`\`\`

3. Se o arquivo `.env` não existir no diretório raiz do projeto, copie o arquivo `.env.example` e renomeie a cópia para `.env`.

4. Preencha o arquivo `.env` com as configurações do seu ambiente. Isso inclui detalhes como o nome do banco de dados, nome de usuário, senha, host do banco de dados, etc.

5. Com o servidor MySQL em execução, execute os seguintes comandos para configurar o banco de dados e iniciar o servidor de desenvolvimento:

\`\`\`bash
php artisan migrate
php artisan key:generate
php artisan serve
\`\`\`

Agora, você deve ser capaz de acessar o projeto em seu navegador através do endereço `http://localhost:8000`.

## Contribuição

Contribuições são bem-vindas. Sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a licença MIT.
