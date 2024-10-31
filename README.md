# Instalar o postgres
brew install postgresql

# Ligar o postgres automaticamente
brew services start postgresql

# Instalar o Git
brew install git

# Configurar o Git
git config --global user.name "Seu nome"
git config --global user.email seuemail@email.com

# Criar Projeto
composer create-project laravel/laravel nome_projeto-api

# Criar arquivo api.php
php artisan install:api

# Instalar o JWT
composer require tymon/jwt-auth

# Publicar o JWT
php artisan vendor:publish

# Criar o JWT Secret
php artisan jwt:secret

# Criar Middleware
php artisan make:middleware nome_middleware

# Registrar Middleware 
App\bootstrap\app.php

# Criar AdapterPaginator
Adapters\AdapterPaginator.php

# Criar Migration
php artisan make:migration nome_migration_table

## Executa Migration
php artisan migrate

## Alterar Tabela 
php artisan make:migration alter_table_model

## Limpa Base de Dados
php artisan migrate:rollback

# Criar Model
php artisan make:model nome_model

# Criar Request
php artisan make:request nome_request

# Criar Resources
php artisan make:resource nome_resouce

# Criar DTOs

# Criar Repositories

# Criar Services

# Criar Controller
php artisan make:controller nome_controller --api

# Criar Middleware
php artisan make:middleware nome_middleware
AdminAcess.php
ClientAcess.php

# Registrar Middleware 
bootstrap\app.php

# Configurar o auth.php
config\auth.php

'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users'
        ]
    ],