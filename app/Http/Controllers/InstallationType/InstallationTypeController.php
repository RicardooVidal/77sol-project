<?php

namespace App\Http\Controllers\InstallationType;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallationType\InstallationTypeRequest;
use App\Domains\InstallationType\Services\InstallationTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InstallationTypeController extends Controller
{
    public function __construct(
        private readonly InstallationTypeService $installationTypeService
    ) {}

    public function index(InstallationTypeRequest $request): JsonResponse
    {
        $data = $this->installationTypeService->getAll($request->validated());
        return response()->json($data, Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $data = $this->installationTypeService->getById($id);

        return response()->json($data, Response::HTTP_OK);
    }
}