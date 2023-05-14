<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testCanCreateCustomer(): void
    {
        $data = [
            'firstName' => 'Stepan',
            'lastName' => 'Stepancev',
            'age' => '48',
            'isBan' => false,
        ];

        $customer = Customer::create($data);

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertInstanceOf(User::class, $customer);

        $this->assertEquals($data['firstName'], $customer->getFirstName());
        $this->assertEquals($data['lastName'], $customer->getLastName());
        $this->assertEquals($data['age'], $customer->getAge());
        $this->assertFalse($customer->getIsBan());

        $customer->setId(33);
        $customer->setFirstName('Petr');
        $customer->setLastName('Petrov');
        $customer->setAge(34);
        $customer->setIsBan(true);

        $this->assertIsInt($customer->getId());
        $this->assertEquals(33, $customer->getId());
        $this->assertIsString($customer->getFirstName());
        $this->assertEquals('Petr', $customer->getFirstName());
        $this->assertIsString($customer->getLastName());
        $this->assertEquals('Petrov', $customer->getLastName());
        $this->assertIsInt($customer->getAge());
        $this->assertEquals(34, $customer->getAge());
        $this->assertIsBool($customer->getIsBan());
        $this->assertTrue($customer->getIsBan());
    }
}
