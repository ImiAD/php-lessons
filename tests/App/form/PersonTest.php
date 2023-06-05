<?php
declare(strict_types=1);

namespace App\form;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testCanCreateAdmin(): void
    {
        $data = [
//            'noId' => 0,
            'id' => '1',
            'name' => 'Petya',
            'email' => 'petay@yandex.ru',
        ];

        $admin = new Admin($data);

        $this->assertIsObject($admin);
        $this->assertInstanceOf(Admin::class, $admin);

        $this->assertIsInt($admin->getId());
        $this->assertIsString($admin->getName());
        $this->assertIsString($admin->getEmail());

//        $this->assertEquals($data['noId'], $admin->getId());
        $this->assertEquals($data['id'], $admin->getId());
        $this->assertEquals($data['name'], $admin->getName());
        $this->assertIsString($data['email'], $admin->getEmail());
    }

    public function testCanCreateUser(): void
    {
        $data = [
//            'id' => '0',
            'id' => '1',
            'name' => 'Ivan',
            'email' => 'test@yancdex.ru',
            'isBan' => false,
            'avatar' => 'dracula',
        ];

        $user = new User($data);

        $this->assertIsObject($user);
        $this->assertInstanceOf(User::class, $user);

        $this->assertIsInt($user->getId());
        $this->assertIsString($user->getName());
        $this->assertIsString($user->getEmail());
        $this->assertIsBool($user->getIsBan());
        $this->assertFalse($user->getIsBan());
//        $this->assertNull($user->getAvatar());
        $this->assertIsString($user->getAvatar());

        $this->assertEquals($data['id'], $user->getId());
        $this->assertEquals($data['name'], $user->getName());
        $this->assertEquals($data['email'], $user->getEmail());
        $this->assertEquals($data['isBan'], $user->getIsBan());
        $this->assertEquals($data['avatar'], $user->getAvatar());
    }
}
