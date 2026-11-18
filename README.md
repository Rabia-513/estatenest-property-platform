<img width="1360" height="724" alt="image" src="https://github.com/user-attachments/assets/17ff845d-2ef4-43a9-b14f-2e40a191d7bd" /># EstateNest — Real Estate Property Platform

A Laravel and MySQL real estate listings application with searchable property listings and an authenticated staff dashboard for managing properties.

**Built by:** Rabia Batool  
**Stack:** PHP 8.3 · Laravel 12 · MySQL 8.4 · Blade · CSS  
**Status:** Locally tested demonstration using fictional property records; not a production deployment.

## Features

### Public website
- Browse a responsive property catalogue showing price, city, property type, bedrooms, bathrooms and floor area.
- Search by keyword and city; filter by property type and maximum price.
- Open individual property pages to view listing details.

### Staff dashboard
- Sign in and sign out as a staff user.
- View, create, edit and delete property listings.
- Validate submissions on the server; use Laravel's CSRF protection.
- Persist property records in MySQL.

## Screenshots

The examples below were captured from the locally running application using fictional listing data.

| Homepage | Property listings |
|---|---|
| ![Homepage] <img width="1360" height="725" alt="image" src="https://github.com/user-attachments/assets/3eb86c4b-3d87-43e3-90fa-dce3b53ddf4d" />
 | ![Property listings](https://github.com/Rabia-513/estatenest-property-platform/blob/main/screenshots/02-property-listings.PNG?raw=true) |

| Property details | Staff dashboard |
|---|---|
| ![Property details](https://github.com/Rabia-513/estatenest-property-platform/blob/main/screenshots/03-property-details.PNG?raw=true) | ![Staff dashboard](https://github.com/Rabia-513/estatenest-property-platform/blob/main/screenshots/04-admin-dashboard.PNG?raw=true) |

| Search and filters | Updated property |
|---|---|
| ![Search and filters](https://github.com/Rabia-513/estatenest-property-platform/blob/main/screenshots/08-search-filters.PNG?raw=true) | ![Property updated](https://github.com/Rabia-513/estatenest-property-platform/blob/main/screenshots/07-property-updated.PNG?raw=true) |



## Architecture

```text
Browser (public catalogue / staff dashboard)
                |
                v
Laravel routes and controllers
                |
                v
Eloquent Property model
                |
                v
MySQL (properties, users, sessions)
```

Main application files:

- `routes/web.php` — public pages and staff routes
- `app/Http/Controllers/PropertyController.php` — property browsing and details
- `app/Http/Controllers/AuthController.php` — staff authentication
- `app/Http/Controllers/Admin/PropertyController.php` — property management
- `app/Models/Property.php` — Eloquent property model
- `database/migrations/` — database structure
- `database/seeders/DatabaseSeeder.php` — fictional properties and optional local staff user
- `resources/views/` — Blade templates
- `public/css/estate.css` — styling

## Running locally on Windows

### Requirements

- PHP 8.2+ (tested on PHP 8.3)
- Composer 2
- MySQL (tested on MySQL 8.4)
- Laragon or equivalent local environment

### Setup

1. Clone the repository and open it in VS Code.
2. Install PHP dependencies:

   ```powershell
   composer install
   ```

3. Copy the environment template:

   ```powershell
   Copy-Item .env.example .env
   ```

4. In your **local** `.env`, configure the database and demo administrator **before seeding**:

   ```dotenv
   APP_NAME=EstateNest
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://127.0.0.1:8000
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=estatenest
   DB_USERNAME=root
   DB_PASSWORD=
   ADMIN_EMAIL=admin@example.test
   ADMIN_PASSWORD=REPLACE_WITH_A_PRIVATE_PASSWORD
   ```

   Set `DB_PASSWORD` to your own local database password if one is required. Never commit your `.env`.

5. Create the MySQL database:

   ```sql
   CREATE DATABASE IF NOT EXISTS estatenest
     CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

6. Generate a local app key, migrate, seed and start:

   ```powershell
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```

7. Visit `http://127.0.0.1:8000` for the catalogue and `http://127.0.0.1:8000/login` for staff login.

> If you already seeded the database, changing `ADMIN_PASSWORD` in `.env` alone may not reset that user's password. Avoid destructive database resets unless you intend to discard existing data.

## Verified functionality

Manual local testing demonstrated the following on November 16, 2026:

| Check | Result |
|---|---|
| Homepage loads | Passed |
| Five fictional demo properties displayed | Passed |
| Individual property details page | Passed |
| Staff login and dashboard access | Passed |
| Create a test property | Passed |
| Edit a property's title | Passed |
| Keyword, city, type and maximum-price filtering | Passed |
| Delete the test property | Passed |

Automated tests and cloud deployment were not demonstrated. See `docs/` for additional project documentation where available.

## Security and limitations

- Never commit `.env`, credential files, database dumps containing personal data, `vendor/`, `node_modules/`, or local logs.
- Only fictional demonstration records are intended for this repository.
- Listing artwork uses placeholders rather than uploaded property photographs.
- The demonstration does not implement payments, third-party listings feeds, image uploads, multiple staff permission levels or production hosting.
- For production use, disable debug mode; configure HTTPS, restricted database permissions, authorization policies, rate limiting, monitoring, backups and automated testing.

## Author

**Rabia Batool**  
Python, automation and web development portfolio
