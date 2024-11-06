<?php

namespace App\Domains\InstallationType\Services;

use App\Domains\InstallationType\Repositories\InstallationTypeRepository;

class InstallationTypeService
{
    public function __construct(
        private readonly InstallationTypeRepository $installationTypeRepository
    ) {}

    public function getAll(array $filters = []): array
    {
        return $this->installationTypeRepository->getAll($filters)->toArray();
    }

    public function getById(int $id): ?array
    {
        return $this->installationTypeRepository->getById($id)->toArray();
    }
}