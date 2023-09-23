<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MensajeProducto;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $unreadMsg = MensajeProducto::where('vendedorid', Auth::id())
                    ->where('status', '0')
                    ->count();
                $view->with('unreadMsg', $unreadMsg);
            }
        });
    }
}
