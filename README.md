## Contacts CRUD (Laravel 8) ([Demo]())

### Introduction

A simple CRUD for manage contacts using Laravel 8. All transaccions work through an REST API.



### Tech stack

**BACK END & REST API**: Laravel 8

**FRONT END** Blade | Javascript | Bootstrap.



### Installation && Configurations


**Create database**

I'm using Msyql

**Create .env file & Configure database** 

    # Database
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=username
    DB_PASSWORD=password

*(.env file could be a copy of .env.example file given in the root directory)*

*REPLACE:*

**{database}** *by your database name created.*

**{username}** *by your username name created.*

**{password}** *by your password created.*

**Install PHP and JS dependencies**

    composer install

    npm install

*(you could use **npm run production** or **npm run watch** if you want to modify the code)*



### Artisan commands

**Generate the laravel key**

    php artisan key:generate

**Running Migrations**

    php artisan migrate

**Seed the database**

    php artisan db:seed

**Serving Laravel**

    php artisan serve

**NPM**
Styles and Scripts are generated using [Laravel Mix](https://laravel.com/docs/8.x/mix).

    npm run <command>

(Example: **npm run dev** or **npm run prod** or **npm run watch**)

**Storage link**

    php artisan storage:link



### API Documentation

*Get all contacts*

**GET** | /contacts

*Get a specific contact by id*

**GET** | /contacts/{id}/view

*Create a new contact - (Data needed: name\*, last_name\*, email\*, phone1, phone2, phone3)*

**POST** | /contacts

*Edit a specific contact*

**PUT** | /contacts/{id}

*Delete a specific contact*

**DELETE** | /contacts/{id}



## It is based on Laravel Boilerplate (Current: Laravel 8.*)

### Official Documentation

[Click here for the official documentation](http://laravel-boilerplate.com)

### License of Laravel Boilerplate

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
