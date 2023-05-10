<?php
declare(strict_types=1);

namespace App;

class UserWriter
{
    private string $about;

    //Какой тип должен возвращать метод?
    public function write(User $value): string
    {
        switch($value) {
            case $value instanceof Admin:
                return $this->writeAdmin($value);
            case $value instanceof Customer:
                return $this->writeCustomer($value);
        }
    }

    private function writeAdmin(User $value): string
    {
        $this->about = $this->writeCustomer($value) . "\n"
            . 'Права: ' . ConvertBoolToString::convertIsAdmin($value);

        return $this->about;
    }

    private function writeCustomer(User $value): string
    {
        $this->about = 'id: ' . $value->getId() . "\n"
            . 'Имя: ' . $value->getFirstName() . "\n"
            . 'Фамилия: ' . $value->getLastName() . "\n"
            . 'Возраст: ' . $value->getAge() . "\n"
            . 'Доступ: ' . ConvertBoolToString::convertIsBan($value);

        return $this->about;
    }
}
