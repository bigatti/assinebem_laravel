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

# Prints de como ficou

![image](https://user-images.githubusercontent.com/16209088/162600429-f6609630-729c-4ceb-994d-37a6a908e389.png)
![image](https://user-images.githubusercontent.com/16209088/162600443-acb1c2aa-7981-4011-8a8c-8c2f9b3a0a7b.png)
![image](https://user-images.githubusercontent.com/16209088/162600434-02586303-8261-4c15-9bca-6bd5f0ded38d.png)
![image](https://user-images.githubusercontent.com/16209088/162600490-7ef46c4b-353e-4a14-97d2-91b4498b5f71.png)
![image](https://user-images.githubusercontent.com/16209088/162600497-ed2b69c5-56d5-4dc3-bf84-9257f304d033.png)
![image](https://user-images.githubusercontent.com/16209088/162600500-a7f30860-fb4b-43ba-9a65-ffda9f6a25fa.png)
![image](https://user-images.githubusercontent.com/16209088/162600508-4fc9cd11-3678-44c9-9fa0-358a678b1fcb.png)
![image](https://user-images.githubusercontent.com/16209088/162600523-2ed5cc97-f0d6-4256-839f-51c4667c8c6b.png)




