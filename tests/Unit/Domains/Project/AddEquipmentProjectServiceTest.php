<?php

namespace Tests\Unit\Domains\Project;

use App\Domains\Project\Entities\Project;
use Tests\TestCase;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectEquipmentDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddEquipmentProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_add_equipment_to_project_successful()
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
    }

    public function test_add_equipment_to_project_error_when_project_does_not_exist()
    {
        $this->seed();

        $projectEquipmentData = [
            'equipment_id' => 1,
            'quantity' => 2
        ];

        $projectDTO = new ProjectEquipmentDTO($projectEquipmentData);

        $this->expectException(ModelNotFoundException::class);

        $projectService = app(ProjectService::class);
        $projectService->addEquipment($projectDTO, 999);
    }

    public function test_add_equipment_to_project_error_when_equipment_does_not_exist()
    {
        $this->seed();

        $project = $this->createProject();

        $projectEquipmentData = [
            'equipment_id' => 999,
            'quantity' => 2
        ];

        $projectDTO = new ProjectEquipmentDTO($projectEquipmentData);

        $this->expectException(QueryException::class);

        $projectService = app(ProjectService::class);
        $projectService->addEquipment($projectDTO, $project->id);
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