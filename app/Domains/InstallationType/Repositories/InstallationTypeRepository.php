<?php

namespace App\Domains\InstallationType\Repositories;

use App\Domains\InstallationType\Entities\InstallationType;
use Illuminate\Support\Collection;

class InstallationTypeRepository
{
    public function __construct(
        private readonly InstallationType $installationType
    ) {}

    public function getAll(array $filters = []): Collection
    {
        return $this->installationType
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

    public function getById(int $id): InstallationType
    {
        return $this->installationType->findOrFail($id);
    }
}