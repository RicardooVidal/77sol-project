<?php

namespace Tests\Unit\Domains\Customer;

use Tests\TestCase;

use Faker\Factory as Faker;
use App\Domains\Customer\Services\CustomerService;
use App\Domains\Customer\Services\DTO\CustomerDTO;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_customer_successful()
    {
        $faker = Faker::create();

        $customerData = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'document' =>  '12345678000195'
        ];

        $customerDTO = new CustomerDTO($customerData);

        $customerService = app(CustomerService::class);
        $customer = $customerService->create($customerDTO);

        $this->assertDatabaseHas('customers', [
            'id' => $customer['id'],
            'name' => $customerData['name'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone'],
            'document' => $customerData['document']
        ]);
    }

    public function test_create_customer_error_when_trying_to_add_duplicated_document()
    {
        $this->seed();

        $faker = Faker::create();

        $customerData = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'document' =>  '11144477735'
        ];

        $customerDTO = new CustomerDTO($customerData);

        $customerService = app(CustomerService::class);
        $customer = $customerService->create($customerDTO);

        $this->assertDatabaseHas('customers', [
            'id' => $customer['id'],
            'name' => $customerData['name'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone'],
            'document' => $customerData['document']
        ]);

        $this->expectException(UniqueConstraintViolationException::class);

        $customer = $customerService->create($customerDTO);
    }

    // public function test_create_customer_error_when_installation_type_does_not_exist()
    // {
    //     $customer = $this->createCustomer();

    //     $customerData = [
    //         'customer_id' => $customer->id,
    //         'installation_type_id' => 1,
    //         'location' => 'SP',
    //     ];

    //     $customerDTO = new CustomerDTO($customerData);
    //     $this->expectException(QueryException::class);

    //     $customerService = app(CustomerService::class);
    //     $customerService->create($customerDTO);
    // }
}