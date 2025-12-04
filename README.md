# Laravel Blade Bilingual Starter Kit (AR/EN) — Drop-in Pack

**Goal**: Full‑stack Laravel (Blade) with AR/EN localization, admin area, domain‑oriented folders, roles/permissions, and clean Vite asset pipeline — no SPA.

## Quick Start (Windows / PowerShell)
> Requires PHP 8.3+, Composer, Node.js

```powershell
# 1) Create a fresh Laravel project
composer create-project laravel/laravel myapp
cd myapp

# 2) Copy the contents of this zip **into** the project root.
#    Allow overwrite when asked (only for files present in this pack).

# 3) Install core packages
composer require laravel/breeze --dev
php artisan breeze:install blade

composer require spatie/laravel-permission
composer require spatie/laravel-medialibrary:^11.0
composer require spatie/laravel-activitylog
composer require spatie/laravel-settings
composer require intervention/image
composer require mcamara/laravel-localization
composer require laravel-lang/publisher --dev
# Optional (queues dashboard)
# composer require laravel/horizon

# 4) Publish vendor configs (where applicable)
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider"
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider"
php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"
# php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider" --tag=config

# 5) Env & app key
copy .env.example .env
php artisan key:generate

# 6) Autoload for domain folder
# Add this to composer.json -> "autoload": { "psr-4": { "App\\Domain\\": "app/Domain/" } }
# Then run:
composer dump-autoload

# 7) DB, storage, migrate & seed
php artisan storage:link
php artisan migrate --seed

# 8) Frontend build
npm install
npm run build

# 9) Run the server
php artisan serve
```

### Important manual tweaks
- **composer.json**: add `"App\\Domain\\": "app/Domain/"` to `autoload.psr-4` then run `composer dump-autoload`.
- **bootstrap/app.php** (Laravel 11): ensure `routes/admin.php` is loaded. Example:

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: __DIR__.'/../routes/health.php',
);
require base_path('routes/admin.php');
```

- **.env** (recommended):
```
APP_LOCALE=ar
APP_FALLBACK_LOCALE=en
APP_TIMEZONE=Asia/Amman
FILESYSTEM_DISK=public
```

### Seed an admin user
After seeding, assign the `admin` role to your user in Tinker or via DB.
```bash
php artisan tinker
>>> $u = App\Models\User::first();
>>> $u->assignRole('admin');
```
Login and visit `/admin`.

---

## What’s included
- `routes/web.php` (localized public routes using laravel-localization)
- `routes/admin.php` (guarded admin area with role:admin)
- Controllers: `Site\HomeController` (invokable), `Admin\DashboardController` (invokable)
- Domain example: `Domain/Services` (Model, Action, Request, Policy, ViewModel) + migration
- Blade layouts + sample views (site+admin) with RTL/LTR handling
- Localization files `lang/ar` & `lang/en`
- Vite entries (`resources/js/*`, `resources/css/*`) + `vite.config.js`
- Seeder: `RolePermissionSeeder` (basic roles/permissions)
- Minimal Tailwind-ready structure (works with your template assets moved under `resources/`)

## Notes
- Keep your template assets under `resources/` and import via Vite (`@vite(...)`). Do not dump vendor CSS/JS into `public/`.
- Use translation keys in Blade: `__('nav.home')` etc.
- The included example feature (Services) uses duplicated AR/EN columns for clarity.
