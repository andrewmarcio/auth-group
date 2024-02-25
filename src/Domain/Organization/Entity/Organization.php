<?php

namespace Domain\Organization\Entity;

use Application\Traits\SalesGroupRelations;
use Domain\Base\Entity\BaseEntity;

class Organization extends BaseEntity {

    use SalesGroupRelations;

    protected $fillable = [
        "name",
        "description",
        "sales_group_id"
    ];

}
