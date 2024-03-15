<?php

namespace Domain\Auth\Service;

use Domain\Auth\Resources\AuthResource;

interface AuthServiceInterface {
    public function login(array $credentials): AuthResource;
}
