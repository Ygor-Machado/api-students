## Passo a passo para rodar o projeto
Tenha o php >= 8.2 e o composer instalado na sua máquina

Clone o projeto
```sh
[git clone https://github.com/Ygor-Machado/api-students.git
```
```sh
cd api-students
```

Digite o comando para instalar dependências
```sh
composer install
```

Clone o arquivo .env e coloque o nome e a senha do seu banco de dados para rodar as migrations
```sh
 cp .env.example .env
 ```
Depois de rode as migrations e inicie o servidor 
```sh
php artisan migrate
php artisan serve
```

Depois escolha qualquer ferramenta para testar a api
```sh
postman, insomnia, etc
```
