<?php

namespace App\Domains\Project\Actions;

use App\Domains\Project\Entities\Project;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;

class UpdateProjectEquipmentAction
{
    public function execute(Project $project, ProjectEquipmentDTO $equipment): void
    {
        $equipmentProject = $project->equipments()->where('equipment_id', $equipment->equipment_id)->firstOrFail();

        $equipmentProject->update([
            'quantity' => $equipment->quantity,
        ]);
    }
}