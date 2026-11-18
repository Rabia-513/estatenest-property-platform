# Windows / VS Code setup — no Docker

## 1. Check prerequisites
Open Windows PowerShell (VS Code terminal):

```powershell
php -v
composer --version
mysql --version
```

Laravel 12 needs PHP 8.2+ with common PHP extensions (PDO MySQL, mbstring, openssl, fileinfo, etc.), plus Composer. Install PHP and Composer if missing; for MySQL you can use MySQL Community Server or a local XAMPP MySQL service. Make sure the database service is running. `mysql` may not be in PATH even when installed.

## 2. Create base Laravel project
**Extract this ZIP outside the destination first** (e.g. Downloads\project5-starter), then choose a separate workspace parent (e.g. Documents\Internship). Do not run create-project inside the extracted starter folder.

```powershell
cd "$HOME\Documents"
mkdir Internship -ErrorAction SilentlyContinue
cd Internship
composer create-project laravel/laravel taw-php-realestate-listings "^12.0"
cd taw-php-realestate-listings
```

Now copy the *contents* of the extracted ZIP's `taw-php-realestate-listings` folder into the newly created Laravel project, merging folders and replacing matching starter files. **Do not copy the starter ZIP itself.** The core Laravel files created by Composer remain intact.

## 3. MySQL
Start your local MySQL service. Create an empty database named `taw_realestate` using MySQL Workbench or:

```sql
CREATE DATABASE taw_realestate CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Set these values in the existing Laravel-generated `.env` file:

```dotenv
APP_NAME=EstateNest
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taw_realestate
DB_USERNAME=root
DB_PASSWORD=your_local_mysql_password
ADMIN_EMAIL=admin@example.test
ADMIN_PASSWORD=choose_a_long_private_password
```

If your database username is not root, use the actual username. Do not push `.env` to GitHub.

## 4. Start
```powershell
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Visit http://127.0.0.1:8000 then http://127.0.0.1:8000/login.

The seeder will create **five demo properties** and an admin account when admin credentials are configured.

## 5. Common problems
- `php` / `composer` not recognized: install tools and restart VS Code/terminal; check PATH.
- `could not find driver`: enable `pdo_mysql` in the active `php.ini` (check `php --ini`).
- `SQLSTATE connection refused`: start MySQL, check DB host/port and password.
- `Base table or view not found`: run `php artisan migrate --seed`.
- `No application encryption key`: run `php artisan key:generate`.
- `Class ... not found`: run `composer dump-autoload` and `php artisan optimize:clear`.
- PHP 8.2 or lower may not support Laravel 13; this starter targets Laravel **12**.
