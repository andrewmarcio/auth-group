<?php

namespace Domain\Establishment\Enum;

use Application\Traits\EnumToArray;

enum EstablishmentTypes: string {
    use EnumToArray;

    case MALL = 'mall';
    case STORE = 'store';
}
