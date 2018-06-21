Best2Pay integration
====================
Best2Pay API integration (including Laravel service provider)



## Installation
```bash
composer require kozz/best2pay ~0.2
```

### Laravel service registration
Package supports auto discovery for Laravel > 5.5

If you have Laravel <5.5, add service provider in `configs/app.php`
```php
'providers' => [
    /*
     * Laravel Framework Service Providers...
     */
    ...

    /*
     * Application Service Providers...
     */
    ...
    Kozz\Best2Pay\Laravel\Providers\Best2PayServiceProvider::class
],
```

You can also add Facade (`configs/app.php`)
```php
'aliases' => [
    ...
    'Best2Pay' => Kozz\Best2Pay\Laravel\Facades\Best2PayFacade::class
],
```

Then run command (it will create `config/best2pay.php` file)

```bash
php artisan vendor:publish
```

