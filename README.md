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

This backend is configured with `APP_URL` and `FRONTEND_URL` environment variables are set to `http://localhost:5001` and `http://localhost:5000`, respectively.

Once the project is configured, you may serve the Laravel application using the `serve` Artisan command:

```bash
# Serve the application...
php artisan serve --port 5001
```
