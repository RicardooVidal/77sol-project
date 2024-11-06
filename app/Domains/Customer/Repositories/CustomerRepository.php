<?php

namespace App\Domains\Customer\Repositories;

use App\Domains\Customer\Entities\Customer;
use Illuminate\Support\Collection;

class CustomerRepository

{
    public function __construct(
        private readonly Customer $customer
    ) {}

    public function getById(int $id): ?Customer
    {
        return $this->customer->findOrFail($id);
    }

    public function getAll(array $filters = []): Collection
    {
        return $this->customer
            ->when(!empty($filters), fn($query) => $query->where($filters))
            ->get();
    }

    public function create(array $params = []): Customer
    {
        return $this->customer->create($params);
    }

    public function update(array $params = [], $id): bool
    {
        return $this->customer->findOrFail($id)->update($params);
    }

    public function delete(int $id): bool
    {
        return $this->customer->findOrFail($id)->delete();
    }
}