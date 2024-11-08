<?php

namespace Tests\Unit\Domains\Customer;

use Tests\TestCase;

use Faker\Factory as Faker;
use App\Domains\Customer\Services\CustomerService;
use App\Domains\Customer\Services\DTO\CustomerDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_update_customer_successful()
    {
        $faker = Faker::create();

        $customer = $this->createCustomer();

        $customerData = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'document' =>  TestCase::DOCUMENTS[array_rand(TestCase::DOCUMENTS)]
        ];

        $customerDTO = new CustomerDTO($customerData);

        $customerService = app(CustomerService::class);
        $customer = $customerService->update($customerDTO, $customer->id);

        $this->assertDatabaseHas('customers', [
            'id' => $customer['id'],
            'name' => $customerData['name'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone'],
            'document' => $customerData['document']
        ]);
    }

    public function test_create_customer_error_when_customer_does_not_exist()
    {
        $this->seed();

        $faker = Faker::create();

        $customerData = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'document' =>  '44072829838'
        ];

        $customerDTO = new CustomerDTO($customerData);

        $this->expectException(ModelNotFoundException::class);

        $customerService = app(CustomerService::class);
        $customer = $customerService->update($customerDTO, 999);

        $this->assertDatabaseHas('customers', [
            'id' => $customer['id'],
            'name' => $customerData['name'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone'],
            'document' => $customerData['document']
        ]);

        $customer = $customerService->create($customerDTO);
    }
}