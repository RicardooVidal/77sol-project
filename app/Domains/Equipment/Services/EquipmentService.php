<?php

namespace App\Domains\Equipment\Services;

use App\Domains\Equipment\Repositories\EquipmentRepository;

class EquipmentService
{
    public function __construct(
        private readonly EquipmentRepository $equipmentRepository
    ) {}

    public function getAll(array $filters = []): array
    {
        return $this->equipmentRepository->getAll($filters)->toArray();
    }

    public function getById(int $id): ?array
    {
        return $this->equipmentRepository->getById($id)->toArray();
    }
}