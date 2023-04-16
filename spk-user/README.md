
## Installation

Install spk-user with composer

```bash
  cd spk-user
  composer Install
```
Then copypaste .env.example
```bash
  cp .env.example .env
```
Build key generate
```bash
  php artisan key:generate
```
Check file .env and then same name DB_DATABASE with db_name at MySql

Migrate schema table database
```bash
  php artisan migrate
```
And finally the running ```php artisan serve```

Open Chrome and laravel is running
```bash
  http://127.0.0.1:8000/
```