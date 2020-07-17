# Beipro

## Prerequisites

- PHP version 7.2.8

To check your version on terminal run ```php -version```

- composer 1.8.4 or higher.
- Docker
- PostgresSQL db

To check if installed on your machine run ```composer -v``` on terminal
To check if docker is installed on your machine run `docker info`
To check php version on your terminal run ```php -version```

### Getting Started

1. Setting Repo.

- ```mkdir project```
- ```cd project```
- ```git clone https://github.com/Teatoller/beipro.git```
- ```cd beipro```
- ```git checkout develop```

v. Open your choice editor  (for vscode run ```code .``` on terminal)

2. Make sure you have the latest .env file as per the `example .env`

- DB_CONNECTION=pgsql
- DB_HOST=127.0.0.1
- DB_PORT=5432
- DB_DATABASE=beipro
- DB_USERNAME=postgres
- DB_PASSWORD=

### Installing PostgresSQL database

a. Refer to [Link](https://medium.com/@Umesh_Kafle/postgresql-and-postgis-installation-in-mac-os-87fa98a6814d) on how to install postgres.
b. On terminal run  ```createdb beipro``` to create a postgreSQL db.

### Start Beipro with Docker [Preffered mode]

- run `make app-build`
- run `make app-start`

### Start Beipro with `php artisan serve`

1. Install dependencies

- ```composer install --ignore-platform-reqs```
- ```php artisan key:generate```
- ```php artisan passport:install```

2. Make sure the PostgreSQL server is running and run the following on your terminal

i. On terminal run ```php artisan serve```

*NB* The backend server will run on port `http://127.0.0.1:8000` and open on the browser. If it does not open it manually.

#### Endpoints

Test with Postman or equivalent.

NB: When creating company **_ensure_** that they exactly match the name in the DepotPriceController

| #  | purpose                         | endpoint              |
|----|---------------------------------|-----------------------|
| 1. | POST:register user              | api/register          |
| 2. | POST:login user                 | api/login             |
| 3. | GET: user profile               | api/profile           |
| 4. | GET: userlogout                 | api/logout            |
| 5. | POST:create password reset token| api/create            |
| 6. | POST:find password reset token  | api/find{id}          |
| 7. | POST:reset password             | api/reset             |
| 8. | CRUD on company                 | api/companies         |
| 9. | CRUD on front office            | api/frontoffices      |
| 10.| CRUD on current prices          | api/currentprices/    |
| 11.| CRUD on company admins          | api/companyadmins     |
|    |                                 |                       |



- stop application ```control + c```

3. To run test `vendor/bin/phpunit`
4. Larascan test run `./vendor/bin/phpstan analyse app` you may add --level=[0-10]
