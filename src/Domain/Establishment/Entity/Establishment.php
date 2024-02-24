<?php

namespace Domain\Establishment\Entity;

use Domain\Base\Entity\BaseEntity;
use Domain\Establishment\Enum\EstablishmentTypes;

class Establishment extends BaseEntity
{
    protected $fillable = [
        "name",
        "configs",
        "establishment_id",
        "organization_id",
        "type",
    ];

    protected $cats = [
        "configs" => "array",
        "type" => EstablishmentTypes::class
    ];
}
