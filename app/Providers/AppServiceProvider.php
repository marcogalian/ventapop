<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\CartDropdown;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;



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
            View::share('categories', $categories);
        } catch (\Throwable $th) {
            dump("ALERT: Recuerda lanzar las migraciones cuando acabes el clone");
        }

        Paginator::useBootstrapFive();
        Livewire::component('cart-dropdown', CartDropdown::class);
    }
}
