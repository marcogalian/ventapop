<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            $categories = Category::all();
            View::Share('categories', $categories);
        } catch (\Throwable $th) {
            dump("ALERT: Recuerda lanzar las migraciones cuando acabes el clone");
        }
    }
}
