<?php

namespace App\Domains\Customer\Services;

use App\Domains\Customer\Repositories\CustomerRepository;
use App\Domains\Customer\Services\DTO\CustomerDTO;

class CustomerService
{
    public function __construct(
        private readonly CustomerRepository $customerRepository
    ) {}

    public function getById(int $id): ?array
    {
        return $this->customerRepository->getById($id)?->toArray();
    }

    public function getAll(array $filters = []): ?array
    {
        return $this->customerRepository->getAll($filters)?->toArray();
    }

    public function create(CustomerDTO $params): array
    {
        return $this->customerRepository->create($params->toArray())->toArray();
    }

    public function update(CustomerDTO $params, $id): bool
    {
        return $this->customerRepository->update($params->toArray(), $id);
    }

    public function delete(int $id): bool
    {
        return $this->customerRepository->delete($id);
    }
}