<?php

namespace Tests\Unit\Domains\Project;

use App\Domains\Project\Entities\Project;
use Tests\TestCase;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteEquipmentProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_delete_equipment_to_project_successful()
    {
        $this->seed();

        $project = $this->createProject();

        $projectEquipmentData = [
            'equipment_id' => 1,
            'quantity' => 2
        ];

        $projectDTO = new ProjectEquipmentDTO($projectEquipmentData);

        $projectService = app(ProjectService::class);
        $projectService->addEquipment($projectDTO, $project->id);

        $this->assertDatabaseHas('projects_equipments', [
            'project_id' => $project->id,
            'equipment_id' => $projectEquipmentData['equipment_id'],
            'quantity' => $projectEquipmentData['quantity'],
        ]);

        $projectService->deleteEquipment($project->id, $projectEquipmentData['equipment_id']);

        $this->assertDatabaseMissing('projects_equipments', [
            'project_id' => $project->id,
            'equipment_id' => $projectEquipmentData['equipment_id']
        ]);
    }

    public function test_update_equipment_to_project_error_when_project_does_not_exist()
    {
        $projectEquipmentData = [
            'equipment_id' => 1,
            'quantity' => 10
        ];

        $projectDTO = new ProjectEquipmentDTO($projectEquipmentData);

        $this->expectException(ModelNotFoundException::class);

        $projectService = app(ProjectService::class);
        $projectService->updateEquipment($projectDTO, 999);
    }

    private function createProject(): Project
    {
        return Project::create([
            'customer_id' => $this->createCustomer()->id,
            'installation_type_id' => 1,
            'location' => 'SP'
        ]);
    }
}