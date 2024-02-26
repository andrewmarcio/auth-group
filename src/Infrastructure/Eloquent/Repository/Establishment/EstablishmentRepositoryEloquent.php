<?php

namespace Infrastructure\Eloquent\Repository\Establishment;

use Domain\Establishment\Repository\EstablishmentRepositoryInterface;
use Domain\Establishment\Entity\Establishment;
use Infrastructure\Eloquent\Repository\BaseRepository\BaseRepositoryEloquent;

class EstablishmentRepositoryEloquent extends BaseRepositoryEloquent implements EstablishmentRepositoryInterface
{
    protected string $model = Establishment::class;
}
