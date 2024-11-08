<?php

namespace App\Domains\Project\Services;

use App\Domains\Project\Actions\DeleteProjectEquipmentAction;
use App\Domains\Project\Actions\StoreProjectEquipmentAction;
use App\Domains\Project\Actions\UpdateProjectEquipmentAction;
use App\Domains\Project\Repositories\ProjectRepository;
use App\Domains\Project\Services\DTO\ProjectDTO;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;

class ProjectService
{
    public function __construct(
        private readonly ProjectRepository $projectRepository
    ) {}

    public function getById(int $id): ?array
    {
        return $this->projectRepository->getById($id)?->toArray();
    }

    public function getAll(array $filters = []): ?array
    {
        return $this->projectRepository->getAll($filters)?->toArray();
    }

    public function create(ProjectDTO $params): array
    {
        return $this->projectRepository->create($params->toArray())->toArray();
    }

    public function addEquipment(ProjectEquipmentDTO $equipment, int $projectId): void
    {
        $project = $this->projectRepository->getById($projectId);
        app(StoreProjectEquipmentAction::class)->execute($project, $equipment);
    }

    public function update(ProjectDTO $params, $id): bool
    {
        return $this->projectRepository->update($params->toArray(), $id);
    }

    public function updateEquipment(ProjectEquipmentDTO $equipment, int $projectId): void
    {
        $project = $this->projectRepository->getById($projectId);
        app(UpdateProjectEquipmentAction::class)->execute(
            $project,
            $equipment
        );
    }

    public function delete(int $id): bool
    {
        return $this->projectRepository->delete($id);
    }

    public function deleteEquipment(int $projectId, int $equipmentId): void
    {
        $project = $this->projectRepository->getById($projectId);
        app(DeleteProjectEquipmentAction::class)->execute($project, $equipmentId);
    }
}