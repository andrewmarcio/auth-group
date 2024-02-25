<?php

namespace Domain\Base\Entity;

use DateTime;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseEntity extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    public function getCreatedAtAttribute(): string|null
    {
        return date_format(new DateTime($this->attributes['created_at']), 'Y-m-d H:i:s') ?? null;
    }

    public function getUpdatedAtAttribute(): string|null
    {
        return date_format(new DateTime($this->attributes['updated_at']), 'Y-m-d H:i:s') ?? null;
    }

    public function getDeletedAtAtAttribute(): string|null
    {
        return date_format(new DateTime($this->attributes['deleted_at']), 'Y-m-d H:i:s') ?? null;
    }
}
