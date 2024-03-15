<?php

namespace Application\Services\Auth;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    protected static string $invalidEmail = 'test#gmail.com';

    protected static array $credentials = [
        "email" => "test@gmail.com",
        "password" => "12345678",
    ];

    public function test_authentication_user_request_validation(): void
    {
        $response = $this->post(route('api.auth.user.login'), [], [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        ]);
        $response->assertUnprocessable();
    }

    public function test_authentication_user_invalid_email(): void
    {
        $response = $this->post(
            route('api.auth.user.login'),
            array_merge(self::$credentials, [
                "email" => self::$invalidEmail,
            ]),
            [
                "Content-Type" => "application/json",
                "Accept" => "application/json",
            ]
        );
        $response->assertUnprocessable();
    }

    public function test_not_authenticate_using_wrong_credentials(): void
    {
        $request = $this->post(route('api.auth.user.login'), self::$credentials);
        $request->assertUnauthorized();
    }

    public function test_authentication_user_success(): void
    {

        $user = UserFactory::new()
            ->count(1)
            ->state([
                "password" => self::$credentials['password']
            ])
            ->create()
            ->first();

        $response = $this->post(route('api.auth.user.login'), array_merge(self::$credentials, [
            "email" => $user->email
        ]));
        $data = $response->json();
        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('expires_in', $data);
    }
}
