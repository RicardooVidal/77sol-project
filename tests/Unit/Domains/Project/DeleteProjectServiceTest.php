<?php

namespace Tests\Unit\Domains\Project;

use App\Domains\Project\Entities\Project;
use Tests\TestCase;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_delete_project_successful()
    {
        $this->seed();

        $customer = $this->createCustomer();

        $projectData = [
            'customer_id' => $customer->id,
            'installation_type_id' => 1,
            'location' => 'SP',
        ];

        $projectDTO = new ProjectDTO($projectData);

        $projectService = app(ProjectService::class);
        $project = $projectService->create($projectDTO);

        $this->assertDatabaseHas('projects', [
            'id' => $project['id'],
            'customer_id' => $projectData['customer_id'],
            'installation_type_id' => $projectData['installation_type_id'],
            'location' => $projectData['location'],
        ]);

        $projectService->delete($project['id']);

        $this->assertDatabaseMissing('projects', [
            'id' => $project['id']
        ]);
    }

    public function test_delete_project_error_when_project_id_does_not_exist()
    {
        $this->expectException(ModelNotFoundException::class);

        $projectService = app(ProjectService::class);
        $projectService->delete(9999);
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