<?php

namespace App\Users;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testObjectAdmin(): void
    {
        $data = [
            'id' => 0,
            'firstName' => 'FirstAdmin',
            'lastName' => 'LastAdmin',
            'age' => 25,
            'isBan' => false,
            'isAdmin' => true,
        ];

        $admin = Admin::create($data);

        $this->assertInstanceOf(User::class, $admin);
        $this->assertInstanceOf(User::class, $admin);
        $this->assertEquals('FirstAdmin', $admin->getFirstName());
        $this->assertEquals('LastAdmin', $admin->getLastName());
        $this->assertEquals(25, $admin->getAge());
        $this->assertEquals(false, $admin->getIsBan());
        $this->assertEquals(true, $admin->getIsAdmin());
    }
}