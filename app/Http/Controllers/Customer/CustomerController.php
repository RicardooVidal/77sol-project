<?php

namespace App\Http\Controllers\Customer;

use App\Domains\Customer\Services\CustomerService;
use App\Domains\Customer\Services\DTO\CustomerDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AllCustomersRequest;
use App\Http\Requests\Customer\CustomerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function __construct(
        private readonly CustomerService $customerService
    ) {}

    public function index(AllCustomersRequest $request): JsonResponse
    {
        $data = $this->customerService->getAll($request->validated());
        return response()->json($data, Response::HTTP_OK);
    }

    public function store(CustomerRequest $request): JsonResponse
    {
        $params = new CustomerDTO($request->validated());
        $data = $this->customerService->create($params);

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $data = $this->customerService->getById($id);

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function update(CustomerRequest $request, string $id)
    {
        $params = new CustomerDTO($request->validated());
        $data = $this->customerService->update($params, $id);

        return response()->json($data, Response::HTTP_OK);
    }

    public function destroy(int $id)
    {
        $data = $this->customerService->delete($id);

        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
