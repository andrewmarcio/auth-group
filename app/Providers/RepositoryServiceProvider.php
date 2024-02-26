<?php

namespace App\Providers;

use Domain\{
    Base\Repository\BaseRepositoryInterface,
    User\Repository\UserRepositoryInterface,
    SalesGroup\Repository\SalesGroupRepositoryInterface,
    Organization\Repository\OrganizationRepositoryInterface,
    Establishment\Repository\EstablishmentRepositoryInterface,
};
use Illuminate\Support\ServiceProvider;
use Infrastructure\Eloquent\Repository\{
    BaseRepository\BaseRepositoryEloquent,
    User\UserRepositoryEloquent,
    SalesGroup\SalesGroupRepositoryEloquent,
    Organization\OrganizationRepositoryEloquent,
    Establishment\EstablishmentRepositoryEloquent,
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
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepositoryEloquent::class);
        $this->app->bind(EstablishmentRepositoryInterface::class, EstablishmentRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
