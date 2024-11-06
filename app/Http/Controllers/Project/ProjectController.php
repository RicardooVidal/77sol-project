<?php

namespace App\Http\Controllers\Project;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectDTO;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;
use App\Http\Requests\Project\DestroyProjectEquipmentRequest;
use App\Http\Requests\Project\AllProjectsRequest;
use App\Http\Requests\Project\ProjectEquipmentRequest;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectService $projectService
    ) {}

    public function index(AllProjectsRequest $request): JsonResponse
    {
        $data = $this->projectService->getAll($request->validated());
        return response()->json($data, Response::HTTP_OK);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $params = new ProjectDTO($request->validated());
        $data = $this->projectService->create($params);

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function storeEquipment(ProjectEquipmentRequest $request, int $projectId): JsonResponse
    {
        $params = new ProjectEquipmentDTO($request->validated());
        $data = $this->projectService->addEquipments($params, $projectId);

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $data = $this->projectService->getById($id);

        return response()->json($data, Response::HTTP_OK);
    }

    public function update(ProjectRequest $request, int $id)
    {
        $params = new ProjectDTO($request->validated());
        $data = $this->projectService->update($params, $id);

        return response()->json($data, Response::HTTP_OK);
    }

    public function updateEquipment(ProjectEquipmentRequest $request, int $projectId): JsonResponse
    {
        $params = new ProjectEquipmentDTO($request->validated());
        $data = $this->projectService->updateEquipment($params, $projectId);

        return response()->json($data, Response::HTTP_OK);
    }

    public function destroy(int $id)
    {
        $data = $this->projectService->delete($id);

        return response()->json($data, Response::HTTP_NO_CONTENT);
    }

    public function destroyEquipment(DestroyProjectEquipmentRequest $request, int $projectId): JsonResponse
    {
        $data = $this->projectService->deleteEquipment($projectId, $request->get('equipment_id'));
        
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
