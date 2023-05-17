<?php
declare(strict_types=1);

namespace App\old;

class UserWriter
{
    public static function write(User $item): string
    {
        $str = !empty($item->getId()) ? "id: {$item->getId()}\n" : '';
        $str .= 'Имя: ' . $item->getFirstName() . "\n";
        $str .= 'Фамилия: ' . $item->getLastName() . "\n";
        $str .= 'Возраст: ' . $item->getAge() . "\n";
        $str .= 'Доступ: ' . $item->getStatus($item);
        $str .= ($item instanceof Admin) ? "\n" . 'Права: ' . $item->getRole($item) : '';

        return $str;
    }
}
