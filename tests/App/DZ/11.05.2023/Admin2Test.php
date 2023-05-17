<?php
declare(strict_types=1);

namespace App\old;

use PHPUnit\Framework\TestCase;

class Admin2Test extends TestCase
{
    public function testCanCreateAdmin(): void
    {
        $data = [
            'id' => '666',
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'age' => '26',
            'isBan' => false,
            'isAdmin' => false,
        ];

        $admin = Admin::create($data);

//        $admin->setIsBan(true);
//        $admin->setIsAdmin(false);

//        $this->assertIsBool($admin->getIsBan());
//        $this->assertTrue($admin->getIsBan());
        $this->assertisBool($admin->getIsAdmin());
        $this->assertFalse($admin->getIsAdmin());
    }
}
