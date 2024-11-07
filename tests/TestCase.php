<?php

namespace Tests;

use Faker\Factory as Faker;
use App\Domains\Customer\Entities\Customer;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    const DOCUMENTS = [
        '12345678909',
        '98765432100',
        '11144477735',
        '12345678000195',
        '23456789000190',
        '34567890000101'
    ];

    protected function createCustomer()
    {
        $faker = Faker::create();

        return Customer::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'document' =>  TestCase::DOCUMENTS[array_rand(TestCase::DOCUMENTS)]
        ]);
    }
}
