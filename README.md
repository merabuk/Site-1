# Онлайн магазин
Пример сайта

## Установка

1. Клонировать репозиторий: `git clone https://github.com/merabuk/Site-1.git`
2. Перейти в репозиторий: `cd Site-1`
3. Установить зависимости composer: `composer install`
4. Установить зависимости npm: `npm install`
5. Создать файл .env в корне приложения: `cp .env.example .env` 
6. Настроить .env файл (URL, база данных) + создать пользователя БД и саму БД
7. Сгенерировать ключ приложения: `php artisan key:generate`
8. Запустить миграции БД: `php artisan migrate:fresh --seed`
9. Почистить кеш: `php artisan clear-compiled` , `php artisan optimize`

## CRON задача

Для корректной работы очередей требуется CRON задача.
- Пример:
`* * * * *	/path_to_php_on_server/php /path_to_web_on_server/site-1/artisan schedule:run >> /dev/null 2>&1`
- `* * * * *` - запуск задачи ежеминутно
- `/path_to_php_on_server/php` - путь на сервере к php
- `/path_to_web_on_server/site-1/artisan` - путь к файлу artisan.php
- `schedule:run >> /dev/null 2>&1` - команда запуска расписания задач

# Online Store
Site example

## Installation

1. Cloning Repository: `git clone https://github.com/merabuk/Site-1.git`
2. Go to repository: `cd Site-1`
3. Set Composer dependencies: `composer install`
4. Install the NPM dependences: `npm install`
5. Create .Env file at the root of the application: `cp .env.example .env`
6. Configure .env file (URL, database) + Create a database user and database itself
7. Generate the key key: `php artisan key:generate`
8. Run the database migration: `php artisan migrate:fresh --seed`
9. Clean the cache: `php artisan clear-compiled` , `php artisan optimize`

## CRON TASK

For correct queue, the CRON task is required.
- Example:
`* * * * *	/path_to_php_on_server/php /path_to_web_on_server/site-1/artisan schedule:run >> /dev/null 2>&1`
- `* * * * *` - launch the task every minute
- `/path_to_php_on_server/php` - path on the server to PHP
- `/path_to_web_on_server/site-1/artisan` - path to the file artisan.php
- `schedule:run >> /dev/null 2>&1` - Task timetable startup command
