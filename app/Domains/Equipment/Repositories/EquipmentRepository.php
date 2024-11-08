<?php

namespace App\Domains\Equipment\Repositories;

use App\Domains\Equipment\Entities\Equipment;
use Illuminate\Support\Collection;

class EquipmentRepository
{
    public function __construct(
        private readonly Equipment $equipment
    ) {}

    public function getAll(array $filters = []): Collection
    {
        return $this->equipment
        ->when(!empty($filters), function($query) use ($filters) {
            foreach($filters as $key => $value) {
                if ($key === 'description') {
                    $query->where($key, 'LIKE', '%' . $value . '%');
                } else {
                    $query->where($key, $value);
                }
            }
        })
        ->get();
    }

    public function getById(int $id): Equipment
    {
        return $this->equipment->findOrFail($id);
    }
}