<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Timezone y Locale Configuración
    |--------------------------------------------------------------------------
    | Configuración de la zona horaria y el idioma de la aplicación.
    |
    */

    'timezone' => 'America/Lima', // Configura la zona horaria de Lima

    'locale' => 'es', // Configura el idioma a español

    'fallback_locale' => 'en',

    'faker_locale' => 'es_PE', // Faker en español peruano

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    | Aquí se deben agregar los proveedores de servicio, incluido el de Spatie.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */
        Spatie\Permission\PermissionServiceProvider::class, // Asegúrate de cargar el proveedor de Spatie

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\FortifyServiceProvider::class,
        App\Providers\JetstreamServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    | Aliases para que Laravel reconozca las clases.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // Otros alias aquí si es necesario
    ])->toArray(),

];
