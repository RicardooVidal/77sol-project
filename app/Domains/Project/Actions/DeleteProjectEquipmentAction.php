<?php

namespace App\Domains\Project\Actions;

use App\Domains\Project\Entities\Project;

class DeleteProjectEquipmentAction
{
    public function execute(Project $project, int $equipmentId): void
    {
        $equipment = $project->equipments()->where('equipment_id', $equipmentId)->firstOrFail();

        $equipment->delete();
    }
}