<?php

namespace Infrastructure\Eloquent\Repository\SalesGroup;

use Domain\SalesGroup\Repository\SalesGroupRepositoryInterface;
use Domain\SalesGroup\Entity\SalesGroup;
use Infrastructure\Eloquent\Repository\BaseRepository\BaseRepositoryEloquent;

class SalesGroupRepositoryEloquent extends BaseRepositoryEloquent implements SalesGroupRepositoryInterface
{
    protected string $model = SalesGroup::class;
}
