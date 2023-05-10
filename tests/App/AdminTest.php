<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testCheckCreateAdmin(): void
    {
        $data = [
            'firstName' => 'IvanAdmin',
            'lastName' => 'IvanovAdmin',
            'age' => 26,
            'isBan' => false,
            'isAdmin' => true,
        ];

        $admin = Admin::create($data);

        $this->assertInstanceOf(Admin::class, $admin);
        $this->assertInstanceOf(User::class, $admin);
        $this->assertEquals('IvanAdmin', $admin->getFirstName());
        $this->assertEquals('IvanovAdmin', $admin->getLastName());
        $this->assertEquals(26, $admin->getAge());
        $this->assertFalse($admin->getIsBan());
        $this->assertTrue($admin->getIsAdmin());

        $admin->setId(1);
        $admin->setFirstName('Petr');
        $admin->setLastName('Petrov');
        $admin->setAge(34);
        $admin->setIsBan(true);
        $admin->setIsAdmin(false);

        $this->assertEquals(1, $admin->getId());
        $this->assertEquals('Petr', $admin->getFirstName());
        $this->assertEquals('Petrov', $admin->getLastName());
        $this->assertEquals(34, $admin->getAge());
        $this->assertTrue($admin->getIsBan());
        $this->assertFalse($admin->getIsAdmin());
    }
}
