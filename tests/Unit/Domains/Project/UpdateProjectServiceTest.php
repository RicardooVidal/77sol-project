<?php

namespace Tests\Unit\Domains\Project;

use App\Domains\Project\Entities\Project;
use Tests\TestCase;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_update_project_successful()
    {
        $this->seed();

        $customer = $this->createCustomer();

        $projectDataToUpdate = [
            'customer_id' => $customer->id,
            'installation_type_id' => 2,
            'location' => 'MG'
        ];

        $project = $this->createProject();

        $projectDTO = new ProjectDTO($projectDataToUpdate);

        $projectService = app(ProjectService::class);
        $projectService->update($projectDTO, $project->id);

        $this->assertDatabaseHas('projects', [
            'customer_id' => $customer->id,
            'installation_type_id' => $projectDataToUpdate['installation_type_id'],
            'location' => $projectDataToUpdate['location']
        ]);
    }

    public function test_update_project_error_when_project_id_does_not_exist()
    {
        $this->seed();

        $customer = $this->createCustomer();

        $projectDataToUpdate = [
            'customer_id' => $customer->id,
            'installation_type_id' => 2,
            'location' => 'MG'
        ];

        $projectDTO = new ProjectDTO($projectDataToUpdate);

        $this->expectException(ModelNotFoundException::class);

        $projectService = app(ProjectService::class);
        $projectService->update($projectDTO, 999);
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