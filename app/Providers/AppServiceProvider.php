<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // Route::ressourceVerbs([
        //     "edit"=>"editer",
        //     "create"=>"creer"
        // ]);

        Blade::directive('datetime', function($expression){
            return "<?= ($expression)->format('d/m/Y - H-i'); ?>";
        });
    }
}
