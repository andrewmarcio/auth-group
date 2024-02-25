<?php

namespace Application\Traits;

use Domain\SalesGroup\Entity\SalesGroup;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait SalesGroupRelations {

    public function salesGroup(): BelongsTo {
        return $this->belongsTo(SalesGroup::class, 'sales_group_id');
    }

    public function salesGroups(): BelongsToMany {
        return $this->belongsToMany(SalesGroup::class, 'sales_groups_'. $this->table, 'sales_group_id');
    }
}
