<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\IRepositories\IUserRepository',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\IRepositories\ITipoUsuarioRepository',
            'App\Repositories\TipoUsuarioRepository'
        );
          $this->app->bind(
            'App\IRepositories\ICategoriaRepository',
            'App\Repositories\CategoriaRepository'
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
