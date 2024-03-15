<?php

namespace Application\Services\Auth;

use Domain\Auth\Resources\AuthResource;
use Domain\Auth\Service\AuthServiceInterface;
use Domain\User\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class AuthService implements AuthServiceInterface
{

    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function login(array $credentials): AuthResource
    {

        $user = $this->repository->getByEmail($credentials['email']);
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new InvalidArgumentException('Invalid Credentials', 401);
        }

        $token = $user->createToken('User Authentication Token');

        $data = [
            'token' => $token->accessToken->token,
            'expires' => $token->accessToken->expires_at,
        ];

        return AuthResource::make($data);
    }
}
