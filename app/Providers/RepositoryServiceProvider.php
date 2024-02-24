<?php

namespace App\Providers;

use Domain\{
    Base\Repository\BaseRepositoryInterface,
    User\Repository\UserRepositoryInterface,
    SalesGroup\Repository\SalesGroupRepositoryInterface
};
use Illuminate\Support\ServiceProvider;
use Infrastructure\Eloquent\Repository\{
    BaseRepository\BaseRepositoryEloquent,
    User\UserRepositoryEloquent,
    SalesGroup\SalesGroupRepositoryEloquent
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepositoryEloquent::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        $this->app->bind(SalesGroupRepositoryInterface::class, SalesGroupRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
