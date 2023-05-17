<?php
declare(strict_types=1);

namespace App\old;

use PHPUnit\Framework\TestCase;

class UserWriterTest extends TestCase
{
    public function testCanCreateAdminWriterObject(): void
    {
        $data = [
            'id' => '1',
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'age' => '26',
            'isBan' => true,
            'isAdmin' => true,
        ];

        $this->assertEquals(
            "id: 1" . "\n"
            . "Имя: Ivan" . "\n"
            . "Фамилия: Ivanov" . "\n"
            . "Возраст: 26" . "\n"
            . "Доступ: Заблокирован" . "\n"
            . "Права: Администратор",
            UserWriter::write(Admin::create($data))
        );

       $data = [
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'age' => '26',
            'isBan' => true,
            'isAdmin' => true,
        ];

       $this->assertEquals("Имя: Ivan" . "\n"
           . "Фамилия: Ivanov" . "\n"
           . "Возраст: 26" . "\n"
           . "Доступ: Заблокирован" . "\n"
           . "Права: Администратор",
            UserWriter::write(Admin::create($data))
       );
    }

    public function testCanCreateCustomerWriterObject(): void
    {
        $data = [
            'id' => '2',
            'firstName' => 'Petr',
            'lastName' => 'Petrov',
            'age' => '47',
            'isBan' => true,
        ];

        $this->assertEquals(
            "id: 2" . "\n"
            . "Имя: Petr" . "\n"
            . "Фамилия: Petrov" . "\n"
            . "Возраст: 47" . "\n"
            . "Доступ: Заблокирован",
            UserWriter::write(Customer::create($data)));
    }
}
