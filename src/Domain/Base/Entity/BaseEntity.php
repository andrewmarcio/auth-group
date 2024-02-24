<?php

namespace Domain\Base\Entity;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseEntity extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
}
