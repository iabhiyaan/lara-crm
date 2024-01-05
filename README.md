## Run Project

- `git clone git@github.com:iabhiyaan/lara-crm.git`
- `composer update`
- `cp .env.example .env`
- `php artisan key:generate`
- setup database credentials like db_name, db_user, passwords etc...
- `php artisan migrate:fresh --seed`
- `php artisan serve`
