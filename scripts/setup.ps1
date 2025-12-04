param(
  [string]$Name = "myapp"
)

Write-Host "Creating Laravel project $Name"
composer create-project laravel/laravel $Name
Set-Location $Name

Write-Host "Copy the contents of the starter pack into this folder, then press Enter to continue..."
Read-Host

composer require laravel/breeze --dev
php artisan breeze:install blade

composer require spatie/laravel-permission `
                 spatie/laravel-medialibrary:^11.0 `
                 spatie/laravel-activitylog `
                 spatie/laravel-settings `
                 intervention/image `
                 mcamara/laravel-localization
composer require laravel-lang/publisher --dev

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider"
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider"
php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"

if (-not (Test-Path .env)) { Copy-Item .env.example .env }
php artisan key:generate
php artisan storage:link

Write-Host "Remember to add App\Domain\ => app/Domain/ to composer.json autoload.psr-4 then run composer dump-autoload."
Pause
