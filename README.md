# Challenge-Sales
Projeto para gerenciamento de vendedores e vendas e envio de e-mails com relatório de vendas.


## Pré-requisitos

- Docker instalado. (Caso for Windows, é necessário do WSL 2 instalado e habilitado no Docker).]

## Para instalar e utilizar o projeto, siga estas etapas:

- Clone do projeto em uma pasta.
- Para realizar a instalação, utilize os seguintes comandos via terminal:
  - Acesse a pasta `server/`
  - `make init` para subir o container do Docker, instalar as dependencias no container e dar as devidas permissões.
  - `make migrate` para criar a tabela na db.
- Para acessar na Web, utilize o link `localhost:3000`.
 
- Para iniciar, crie um vendedor na aba 'New Seller', após criar, será listado na aba 'Sellers'.
- Após criar um vendedor, crie uma venda na aba 'New Sale', após criar, será possível listar a venda pelo vendedor, basta ir até a aba 'Sales' e selecionar o vendedor.

- Após registrado os itens é necessário executar na pasta `server/` do projeto o seguinte comando para disparar o e-mail: `make emails`, (Opção manual por conta da falta do Supervisor).
  - Para visualizar o e-mail, basta acessar o link `localhost:8025`.