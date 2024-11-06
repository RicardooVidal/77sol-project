<?php

namespace App\Domains\Project\Repositories;

use App\Domains\Project\Entities\Project;
use App\Domains\Project\Entities\ProjectEquipment;
use Illuminate\Support\Collection;

class ProjectRepository
{
    public function __construct(
        private readonly Project $project,
        private readonly ProjectEquipment $projectEquipment
    ) {}

    public function getById(int $id): ?Project
    {
        return $this->project
            ->with(['equipments.equipment:id,description'])
            ->with(['customer:id,name'])
            ->findOrFail($id);
    }

    public function getAll(array $filters = []): Collection
    {
        return $this->project
            ->with(['equipments.equipment:id,description'])
            ->with(['customer:id,name'])
            ->when(!empty($filters), fn($query) => $query->where($filters))
            ->get();
    }

    public function create(array $params = []): Project
    {
        return $this->project->create($params);
    }

    public function update(array $params = [], $id): bool
    {
        return $this->project->findOrFail($id)->update($params);
    }

    public function delete(int $id): bool
    {
        return $this->project->findOrFail($id)->delete();
    }
}