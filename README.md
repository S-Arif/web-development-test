<p align="center">
    <h1>Web Development Test</h1>
</p>

## Instruction

Please clone the project by running this command.

````
git clone git@github.com:S-Arif/web-development-test.git
````

Install composer dependencies by running this command

```$xslt
composer install
````

Copy `.env.example` file by running this command

```$xslt
cp .env.example .env
````

please make changes in `.env` as per needed and add database and stmp credentials either use mailtraip or any other smtp

In order to setup database please run this command make sure clear cache after making changes in config

```$xslt
php artisan config:cache
php artisan migrate --seed
```

Run server

```$xslt
php artisan serve
```

navigate to the running server

```$xslt
http://localhost:8000/admin
```

use this credentials to logging in to server

```$xslt
email: admin@admin.com
password: password
```
