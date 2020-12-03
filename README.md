# Laravel Todo API

A simple RESTful API for managing to-do items. Equipped with [Sanctum](https://laravel.com/docs/master/sanctum) token based authentication and [laravel-permission](https://github.com/spatie/laravel-permission) permission based authorization.

This project aims to demonstrate a real-world [Laravel](https://laravel.com/) RESTful API that adheres to the community's best practices and coding standards.

## Installation

To install the dependencies, navigate to the project's root directory and run:

```bash
composer install
```

Copy the contents of `.env.example` to a `.env` file, or simply run this command:

```bash
# Linux
cp .env.example .env
# Windows
copy .env.example .env
```

Configure the environment variables on the `.env` file then generate the application key by running:

```bash
php artisan key:generate
```

To the run the migrations, execute the `migrate` command:

```bash
php artisan migrate
```

Run the seeder to create users, roles, and permissions using this command:

```bash
php artisan db:seed
```

## Postman Collection

Published documentation of the Postman collection can be found [here](https://documenter.getpostman.com/view/8446183/TVmMewh8). You can run the collection by clicking the `► Run in Postman` button on the documentation page. The `Development` environment must be set as the active environment.

| Environment Variable | Description                                     |
| -------------------- | ----------------------------------------------- |
| server               | Must be manually set with the application's URL |
| token                | Automatically set after a successful login      |
