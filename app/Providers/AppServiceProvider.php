<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        //Ejemplo: decirle a Laravel que también cargue migraciones desde otra carpeta
        $this->loadMigrationsFrom([
        database_path('migrations'),
        base_path('database/migrations'),
    ]);
    }
}
