<?php

namespace Presentation\Controllers\Auth;

use App\Http\Controllers\Controller;
use Application\Services\Auth\AuthService;
use Domain\Auth\Requests\AuthLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {
    }

    public function login(AuthLoginRequest $request): JsonResponse
    {
        try {
            return response()->json($this->service->login($request->validated()), JsonResponse::HTTP_OK);
        } catch (Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 401);
        }
    }
}
