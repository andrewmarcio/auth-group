<?php

namespace Domain\Establishment\Entity;

use Application\Traits\AddressRelation;
use Domain\Base\Entity\BaseEntity;
use Domain\Establishment\Enum\EstablishmentTypes;

class Establishment extends BaseEntity
{
    use AddressRelation;

    protected $fillable = [
        "name",
        "description",
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
