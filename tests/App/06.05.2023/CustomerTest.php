<?php

namespace App;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testCustomerObject(): void
    {
        $data = [
            'id' => 99,
            'firstName' => 'FirstNameCustomer',
            'lastName' => 'LastNameCustomer',
            'age' => 50,
            'isBan' => false,
        ];

        $customer = Customer::create($data);

        $this->assertInstanceOf(User::class, $customer);
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals(99, $customer->getId());
        $this->assertEquals('FirstNameCustomer', $customer->getFirstName());
        $this->assertEquals('LastNameCustomer', $customer->getLastName());
        $this->assertEquals(50, $customer->getAge());
        $this->assertEquals(false, $customer->getIsBan());
    }
}