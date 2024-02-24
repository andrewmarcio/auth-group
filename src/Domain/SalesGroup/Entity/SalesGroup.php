<?php

namespace Domain\SalesGroup\Entity;

use Domain\Base\Entity\BaseEntity;
use Domain\SalesGroup\Enum\SalesGroupStatuses;

class SalesGroup extends BaseEntity
{
    protected $fillable = [
        "name",
        "description",
        "status"
    ];

    protected $casts = [
        "status" => SalesGroupStatuses::class
    ];

}
