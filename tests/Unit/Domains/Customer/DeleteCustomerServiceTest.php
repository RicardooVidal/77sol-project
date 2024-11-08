<?php

namespace Tests\Unit\Domains\Customer;

use Tests\TestCase;

use App\Domains\Customer\Services\CustomerService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_delete_customer_successful()
    {
        $customer = $this->createCustomer();

        $customerService = app(CustomerService::class);
        $customerService->delete($customer->id);

        $this->assertSoftDeleted('customers', [
            'id' => $customer->id
        ]);
    }

    public function test_delete_customer_error_when_customer_does_not_exist()
    {
        $this->expectException(ModelNotFoundException::class);

        $customerService = app(CustomerService::class);
        $customerService->delete(999);
    }
}