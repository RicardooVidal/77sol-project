<?php

namespace App\Http\Controllers\Equipment;

use App\Domains\Equipment\Services\EquipmentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EquipmentController extends Controller
{
    public function __construct(
        private readonly EquipmentService $equipmentService
    ) {}

    public function index(EquipmentRequest $request): JsonResponse
    {
        $data = $this->equipmentService->getAll($request->validated());
        return response()->json($data, Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $data = $this->equipmentService->getById($id);

        return response()->json($data, Response::HTTP_CREATED);
    }
}