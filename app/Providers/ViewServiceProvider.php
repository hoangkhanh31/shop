<?php
 
namespace App\Providers;

use App\Http\View\Composer\CartComposer;
use App\Http\View\Composer\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       view()->composer('header', MenuComposer::class);
       view()->composer('cart', CartComposer::class);
    }
}