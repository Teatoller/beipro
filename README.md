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
i. ```mkdir project```
ii. ```cd project```
iii. ```git clone https://github.com/Teatoller/beipro.git```
iv.```cd beipro```
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

i. run `make app-build`
ii. run `make app-start`

### Start Beipro with `php artisan serve`

1. Install dependencies

- ```composer install --ignore-platform-reqs```

2. Make sure the PostgreSQL server is running and run the following on your terminal

i. On terminal run ```php artisan serve```

*NB* The backend server will run on port `http://127.0.0.1:8000` and open on the browser. If it does not open it manually.

#### Endpoints

| #  | purpose                         | endpoint              |
|----|---------------------------------|-----------------------|
| 1. | to login/register               | /login                |
| 2. | to add new markerter and prices | /nairobiprices/create |
| 3. | to view prevailing prices       | /nairobiprices        |
|    |                                 |                       |

- stop application ```control + c```
