## try-laravel-php-fpm

[![PHP](https://img.shields.io/badge/php-%5E8.0-blue)](https://www.php.net/releases/8.0/en.php)

This is trial with **Laravel**, a web application framework with expressive, elegant syntax.

https://laravel.com/

https://github.com/laravel/laravel

### Setup for local development
1. create file **.env** from **.env.example**
2. start server with `docker compose up -d`
3. remote server with `docker exec -it app sh`
4. run with `composer install`
5. browse server at http://127.0.0.1:8080/
6. shutdown server with `docker compose down`
7. rebuild image with `docker compose build`

### Tools
1. use **Adminer** to connect to database at http://127.0.0.1:8082/
