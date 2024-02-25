<?php

namespace Infrastructure\Eloquent\Repository\Organization;

use Domain\Organization\Repository\OrganizationRepositoryInterface;
use Domain\Organization\Entity\Organization;
use Infrastructure\Eloquent\Repository\BaseRepository\BaseRepositoryEloquent;

class OrganizationRepositoryEloquent extends BaseRepositoryEloquent implements OrganizationRepositoryInterface
{
    protected string $model = Organization::class;
}
