<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testCheckCreateCustomer(): void
    {
        $data = [
            'firstName' => 'Stepan',
            'lastName' => 'Stepancev',
            'age' => 48,
            'isBan' => false,
        ];

        $customer = Customer::create($data);

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertInstanceOf(User::class, $customer);

        $this->assertEquals('Stepan', $customer->getFirstName());
        $this->assertEquals('Stepancev', $customer->getLastName());
        $this->assertEquals(48, $customer->getAge());
        $this->assertEquals(false, $customer->getIsBan());

        $customer->setId(10);
        $this->assertEquals(10, $customer->getId());
    }
}
