<?php

namespace Tests\Unit\Domains\Project;

use Tests\TestCase;

use App\Domains\Project\Services\ProjectService;
use App\Domains\Project\Services\DTO\ProjectDTO;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_project_successful()
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
    }

    public function test_create_project_error_when_customer_does_not_exist()
    {
        $customer = $this->createCustomer();

        $projectData = [
            'customer_id' => $customer->id,
            'installation_type_id' => 1,
            'location' => 'SP',
        ];

        $projectDTO = new ProjectDTO($projectData);

        $this->expectException(QueryException::class);

        $projectService = app(ProjectService::class);
        $projectService->create($projectDTO);
    }

    public function test_create_project_error_when_installation_type_does_not_exist()
    {
        $customer = $this->createCustomer();

        $projectData = [
            'customer_id' => $customer->id,
            'installation_type_id' => 1,
            'location' => 'SP',
        ];

        $projectDTO = new ProjectDTO($projectData);
        $this->expectException(QueryException::class);

        $projectService = app(ProjectService::class);
        $projectService->create($projectDTO);
    }
}