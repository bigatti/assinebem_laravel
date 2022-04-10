# Laravel - Assine Bem exemplo

Projeto minimo de exemplo de integração com a Assine Bem.

## Features

- Laravel 8
- Laravel UI
- Bootstrap 5
- Webpixels CSS (Bootstrap 5)
- Laravel Mix

### Como iniciar aplicação
- Instalar o **composer**;
- Clonar repositório;
- Criar arquivo .env com base no exemplo .env.example;
- Preencher dados do banco de dados que irá usar e token/secrets da assine bem no arquivo .env (já existe as entradas, só altere os valores):

```
DB_DATABASE=assinebem
ASSINE_BEM_TOKEN="SEU_TOKEN"
ASSINE_BEM_SECRET="SEU_SECRET"
```

**Rodar comandos:**
- Instalar as dependências:
`compose install`

- Comando abaixo para criar banco de dados:
`php artisan migrate`
- Iniciar servidor do laravel:
`php artisan serve`
Irá iniciar na URL: http://127.0.0.1:8000

Ao acessar a URL irá para uma tela de login, e abaixo do botão para se logar vai ter opção de se cadastrar, após se cadastrar se logue.
Se foi preenchido corretamente o token e secret da assine bem a integração já está funcionando.

