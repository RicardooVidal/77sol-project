<?php

namespace App\Domains\Project\Actions;

use App\Domains\Project\Entities\Project;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;
use Exception;

class StoreProjectEquipmentAction
{
    public function execute(Project $project, ProjectEquipmentDTO $equipment): void
    {
        $equipmentProject = $project->equipments()->where('equipment_id', $equipment->equipment_id)->first();

        if ($equipmentProject) {
            throw new Exception('Equipment already on project');
        }

        $project->equipments()->create([
            'project_id' => $project->id,
            'equipment_id' => $equipment->equipment_id,
            'quantity' => $equipment->quantity
        ]);
    }
}