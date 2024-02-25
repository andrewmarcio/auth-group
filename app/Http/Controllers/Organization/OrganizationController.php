<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Application\Services\Organization\OrganizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrganizationController extends Controller
{
    public function __construct(private OrganizationService $service)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->list(), JsonResponse::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json($this->service->find($id), JsonResponse::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json($this->service->create($request->all()), JsonResponse::HTTP_CREATED);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        return response()->json($this->service->update($id, $request->all()), JsonResponse::HTTP_OK);
    }

    public function destroy(string $id): Response
    {
        $this->service->remove($id);
        return response()->noContent();
    }

}
