<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class UserWriterTest extends TestCase
{
    public function testCheckCreateAdminWriterObject(): void
    {
        $data = [
            'id' => 1,
            'firstName' => 'IvanAdmin',
            'lastName' => 'IvanovAdmin',
            'age' => 26,
            'isBan' => false,
            'isAdmin' => true,
        ];

        $writer = new UserWriter();

        $this->assertInstanceOf(UserWriter::class, $writer);
        $this->assertEquals(
            "id: 1" . "\n"
            . "Имя: IvanAdmin" . "\n"
            . "Фамилия: IvanovAdmin" . "\n"
            . "Возраст: 26" . "\n"
            . "Доступ: Не заблокирован" . "\n"
            . "Права: Администратор",
            $writer->write(Admin::create($data))
        );

    }

    public function testCheckCreateCustomerWriterObject(): void
    {
        $data = [
            'id' => 2,
            'firstName' => 'Petr',
            'lastName' => 'Petrov',
            'age' => 47,
            'isBan' => false,
        ];

        $writer = new UserWriter();

        $this->assertInstanceOf(UserWriter::class, $writer);
        $this->assertEquals(
            "id: 2" . "\n"
            . "Имя: Petr" . "\n"
            . "Фамилия: Petrov" . "\n"
            . "Возраст: 47" . "\n"
            . "Доступ: Не заблокирован",
            $writer->write(Customer::create($data)));

    }
}
