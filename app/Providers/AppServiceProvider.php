<?php

namespace App\Providers;

use App\Services\Contracts\RoleService;
use App\Services\Contracts\UserService;
use App\Services\Impls\RoleServiceImpl;
use App\Services\Impls\UserServiceImpl;
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
        $this->app->singleton(UserService::class, UserServiceImpl::class);
        $this->app->singleton(RoleService::class, RoleServiceImpl::class);
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
