# Next.js Backend demo ▲

## Introduction

This repository is the backend for https://github.com/pniaps/next-front.git.

## Getting started

First, clone and configure the backend.

```bash
# Clone backend repository
git clone https://github.com/pniaps/next-back.git

# Enter backend folder
cd next-back

# Install composer dependencies
composer install --optimize-autoloader

# Create environment file
php -r "file_exists('.env') || copy('.env.example', '.env');"

# Set the application key 
php artisan key:generate --ansi
```

Once the project has been cloned and environment file created, we have to configure a database. By default, your application's `.env` configuration file specifies that Laravel will be interacting with a MySQL database and will access the database at `127.0.0.1`.

If you do not want to install MySQL or Postgres on your local machine, you can always use a [SQLite](https://www.sqlite.org/index.html) database. SQLite is a small, fast, self-contained database engine. To get started, update your `.env` configuration file to use Laravel's `sqlite` database driver. You may remove the other database configuration options:

```ini
+DB_CONNECTION=sqlite
-DB_CONNECTION=mysql
-DB_HOST=127.0.0.1
-DB_PORT=3306
-DB_DATABASE=laravel
-DB_USERNAME=root
-DB_PASSWORD=
```

Once you have configured your SQLite database, you may run your application's [database migrations](/docs/{{version}}/migrations), which will create your application's database tables:

```bash
# Run database migrations...
php artisan migrate
```

This backend is configured with `APP_URL` and `FRONTEND_URL` environment variables are set to `http://localhost:5001` and `http://localhost:5000`, respectively. There is also a variable `SANCTUM_STATEFUL_DOMAINS` configured to be able to authenticate using sessions. If you want to use other hosts or ports you will have to configure this variables.

Once the project is configured, you may serve the Laravel application using the `serve` Artisan command:

```bash
# Serve the application...
php artisan serve --port 5001
```

## Sending email

If you want to be able to recover your account by mail, yo need to configure the `MAIL_*` settings in `.env` file. By default is configured to use localhost on port 1025, ready to use by https://mailpit.axllent.org/

## Commands

In addition to laravel's built-in commands, you can use the command ´users:create´ to create any number of users between 10 an 2000. Each time you use this command, users will be deleted and regenerated. There is also an API endpoint which calls this command, used by the frontend.

```bash
# Create 30 users
php artisan users:create

# Create 100 users
php artisan users:create --number=100

# Create 50 users by HTTP
http://localhost:5001/api/createUsers/50
```
