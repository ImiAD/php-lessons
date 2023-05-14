<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testCanCreateAdmin(): void
    {
        $data = [
            'id' => '666',
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'age' => '26',
            'isBan' => false,
            'isAdmin' => true,
        ];

        $admin = Admin::create($data);

        $this->assertInstanceOf(Admin::class, $admin);
        $this->assertInstanceOf(User::class, $admin);

        $this->assertIsInt($admin->getId());
        $this->assertEquals($data['id'], $admin->getId());
        $this->assertIsString($admin->getFirstName());
        $this->assertEquals($data['firstName'], $admin->getFirstName());
        $this->assertIsString($admin->getLastName());
        $this->assertEquals($data['lastName'], $admin->getLastName());
        $this->assertIsInt($admin->getAge());
        $this->assertEquals($data['age'], $admin->getAge());
        $this->assertIsBool($admin->getIsBan());
        $this->assertFalse($admin->getIsBan());
        $this->assertisBool($admin->getIsAdmin());
        $this->assertTrue($admin->getIsAdmin());

        $admin->setId(1);
        $admin->setFirstName('Petr');
        $admin->setLastName('Petrov');
        $admin->setAge(34);
        $admin->setIsBan(true);
        $admin->setIsAdmin(false);

        $this->assertIsInt($admin->getId());
        $this->assertEquals(1, $admin->getId());
        $this->assertIsString($admin->getFirstName());
        $this->assertEquals('Petr', $admin->getFirstName());
        $this->assertIsString($admin->getLastName());
        $this->assertEquals('Petrov', $admin->getLastName());
        $this->assertIsInt($admin->getAge());
        $this->assertEquals(34, $admin->getAge());
        $this->assertIsBool($admin->getIsBan());
        $this->assertTrue($admin->getIsBan());
        $this->assertisBool($admin->getIsAdmin());
        $this->assertFalse($admin->getIsAdmin());
    }
}
