<?php

namespace App\Providers;

use App\interfaces\CrudInterface;
use App\repository\CrudRepository;
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
        $this->app->bind(CrudInterface::class,CrudRepository::class);
    }
}
