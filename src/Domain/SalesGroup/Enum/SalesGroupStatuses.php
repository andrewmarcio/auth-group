<?php

namespace Domain\SalesGroup\Enum;

use Application\Traits\EnumToArray;

enum SalesGroupStatuses: string {
    use EnumToArray;

    case PENDING = 'pending';
    case ACTIVE = 'active';
    case CANCELED = 'canceled';
}
