<?php

namespace Infrastructure\Eloquent\Repository\User;

use Domain\User\Entity\User;
use Domain\User\Repository\UserRepositoryInterface;
use Infrastructure\Eloquent\Repository\BaseRepository\BaseRepositoryEloquent;

class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepositoryInterface
{
    protected string $model = User::class;

    public function getByEmail(string $email): ?User
    {
        return $this->resolvedModel()->whereEmail($email)->first();
    }
}
