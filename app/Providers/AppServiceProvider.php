<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(
            'App\IRepositories\IProductoRepository',
            'App\Repositories\ProductoRepository'
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
