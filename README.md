## API usando Laravel

Utilizado o laravel para criar API para as rotas:

\*Rotas:
Listar Todos

-   GET /clientes

Criar

-   POST /cliente/create

Recuperar id

-   GET /cliente/{id}

Atualizar

-   PUT /cliente/update

Deletar

-   DELETE /cliente/{id}

## Criar base de Dados

Utilizado o MySql:

create database es20241;

## Instalar o Composer

Para instalar o Composer é necessário ter o PHP na máquina antes, pode-se se utilizar o XAMPP:
https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.0.30/xampp-windows-x64-8.0.30-0-VS16-installer.exe

Após a instalação, baixa o composer e na instalação já identificará o PHP ... next next
https://getcomposer.org/Composer-Setup.exe

## Download do repositório

git clone https://github.com/jeansaraujo/Projeto-ES-back_laravel.git

### Configurar variáveis de ambiente - Laravel

Arquivo .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=es20241
DB_USERNAME=root
DB_PASSWORD=upe

A senha do BD deve estar igual e o database já criado

## Atualizar Pacotes

No terminal dentro da pasta do projeto Laravel, usar comando:

composer update

## Criação das tabelas

php artisan migrate

## Rodar API

php artisan serve

## Rotas para autenticação

Usuarios
GET
'/usuarios'
POST
'/usuario/create'
GET
'/usuario/{id}'
PUT
'/usuario/update'
DELETE
'/usuario/{id}'

## Rota para login

GET
'/login'
