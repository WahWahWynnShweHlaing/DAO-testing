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
        $this->app->bind('App\Contracts\Services\UsersServiceInterface', 'App\Services\UsersService');
        $this->app->bind('App\Contracts\Dao\UsersDaoInterface', 'App\Dao\UsersDao');

        $this->app->bind('App\Contracts\Services\NewsServiceInterface', 'App\Services\NewsService');
        $this->app->bind('App\Contracts\Dao\NewsDaoInterface', 'App\Dao\NewsDao');

        $this->app->bind('App\Contracts\Services\SendMailServiceInterface', 'App\Services\SendMailService');
        $this->app->bind('App\Contracts\Dao\SendMailDaoInterface', 'App\Dao\SendMailDao');

        $this->app->bind('App\Contracts\Services\AdminServiceInterface', 'App\Services\AdminService');
        $this->app->bind('App\Contracts\Dao\AdminDaoInterface', 'App\Dao\AdminDao');
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
