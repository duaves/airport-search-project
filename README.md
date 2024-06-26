# Cервис автокомплита для поиска аэропортов по части названия.

## О проекте
Проект представляет собой REST API сервис автокомплита для поиска аэропортов по части их названия на Laravel. Пользователи могут отправлять запросы на сервер, указывая часть названия аэропорта, и получать соответствующие результаты в формате JSON.

## Технологии
- Laravel
- MySQL
- Redis
- Swagger
- PHPUnit

## ROADMAP
[ROADMAP](ROADMAP.md)

## Установка
Скопируйте данный проект к себе на компьютер с помощью команды
```
git clone https://github.com/duaves/airport-search-project.git
```
Переименуйте .env.example в .env, и измените значения данных полей
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=airport-search
DB_USERNAME="логин от базы данных"
DB_PASSWORD="пароль от базы данных"

```
Установите зависимости
```
composer install
```
А также
```
npm install
```
Сгенерируйте уникальный ключ для приложения
```
php artisan key:generate
```
Инициализируйте миграции
```
php artisan migrate
```
Запустите тесты
```
php artisan test
```
Запустите встроенный сервер
```
php artisan serve
```
Примеры запросов для поиска информации об аэропортах находятся в файле с тестами AirportControllerTest.

Перейдите по адресу для ознакомления с документацией Swagger.
http://127.0.0.1:8000/api/documentation
