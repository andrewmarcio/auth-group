<?php

namespace Domain\Address\Entity;

use Domain\Base\Entity\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends BaseEntity
{
    use HasFactory;

    protected $fillable = [
        "addressable_id",
        "addressable_type",
        "street",
        "neighborhood",
        "city",
        "uf",
        "number",
        "location"
    ];

    protected $casts = [
        "location" => "array"
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
