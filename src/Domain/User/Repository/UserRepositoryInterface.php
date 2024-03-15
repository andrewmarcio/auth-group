<?php

namespace Domain\User\Repository;

use Domain\Base\Repository\BaseRepositoryInterface;
use Domain\User\Entity\User;

interface UserRepositoryInterface extends BaseRepositoryInterface {
    public function getByEmail(string $email): ?User;
}
