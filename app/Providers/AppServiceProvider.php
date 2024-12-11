<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // Import Blade facade
use Illuminate\Support\Facades\Gate;
use App\Models\Material;
use App\Policies\MaterialPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the @role directive
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole('{$role}')): ?>";
        });

        // Register the @endrole directive
        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });

        Gate::policy(Material::class, MaterialPolicy::class);

    }
}
