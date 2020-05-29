# SaySo Backend: Laravel

Skeletal fullstack MicroService built with PHP on [Laravel](https://laravel.com/), backed by MySQL, including CRUD operations, authentication (JWTs), routing, pagination, and more.

## Installation

### PHP Env

There's a MacOS 10.15 bug the the PHPEnv installers. None of the Shims get created. The magic commands to get PHPEnv to compile PHP right on MacOS 10.15:

```sh
$ brew install bzip2 icu4c krb5 libedit libiconv libxml2 libzip oniguruma openssl@1.1 tidy-html5

$ PKG_CONFIG_PATH="$(brew --prefix krb5)/lib/pkgconfig:$(brew --prefix icu4c)/lib/pkgconfig:$(brew --prefix libedit)/lib/pkgconfig:$(brew --prefix libxml2)/lib/pkgconfig:$(brew --prefix libzip)/lib/pkgconfig:$(brew --prefix oniguruma)/lib/pkgconfig:$(brew --prefix openssl@1.1)/lib/pkgconfig:$(brew --prefix tidy-html5)/lib/pkgconfig" PHP_BUILD_CONFIGURE_OPTS="--with-bz2=$(brew --prefix bzip2) --with-iconv=$(brew --prefix libiconv)"

$ phpenv install 7.4.6

$ phpenv rehash
```
Restart or launch another Terminal.

https://techhub.erimy.net/archives/4744818-dd-166191-c-3-e-6-b

### Clone and Install Dependencies

Clone the repository. `cd` into its root dir.

Install Dependencies:

```sh
$ composer install
```

Change `.env` file to point to your DB.

Generate App key:

```sh
$ php artisan key:generate
```

Generate JWT secret key:

```sh
$ php artisan jwt:generate
```

Run migrations:

```sh
$ php artisan migrate
```

Start the app:

```sh
$ php artisan serve
```

Browse the service at http://localhost:8000. The API actually resides at http://localhost:8000/api. The JS frontend makes REST calls to it.

## Seed DB

Set properties in `DummyDataSeeder.php` as needed.

Seed the DB with test records:

```sh
$ php artisan db:seed
```

If you need to whipe the data and start fresh:

```sh
$ php artisan migrate:refresh
```

## Routes

```sh
$ php artisan route:list
```

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - Authentication using JSON Web Tokens
- [laravel-cors](https://github.com/barryvdh/laravel-cors) - Handling Cross-Origin Resource Sharing (CORS)

## Env Vars

- `.env` - DB Connection and other environment variables

## Tests

### Install PHPUnit

```sh
$ composer global require phpunit/phpunit:\*
$ :
$ phpenv which phpunit

/Users/russ/.phpenv/versions/7.4.6/composer/vendor/bin/phpunit

$ phpunit --version

PHPUnit 9.1.5 by Sebastian Bergmann and contributors.
```

Run Suite:

```sh
$ phpunit
```

## Request Headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [Routes](#Routes) for more info.

## Authentication

Uses JSON Web Token (JWT) for Authentication. Token is passed with each Request using the `Authorization` header with `Token` scheme. The JWT-authentication middleware handles the validation and authentication of the token.

- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

## Cross-Origin Resource Sharing (CORS)

This applications has CORS enabled on all endpoints. The code whitelists requests from `http://localhost:3000` and `http://localhost:4200`. Do a search in this code for `CORS_ALLOWED_ORIGINS`, and change accordingly.

- https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
- https://en.wikipedia.org/wiki/Cross-origin_resource_sharing
- https://www.w3.org/TR/cors
