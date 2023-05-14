<?php
declare(strict_types=1);

namespace App;

class UserWriter
{
    public static function write(User $item): string
    {
        $string = !empty($item->getId()) ? "id: {$item->getId()} \n" : '';
        $string .= "Имя: {$item->getFirstName()}\nФамилия: {$item->getLastName()}\nДата рождения: {$item->getBirthday()}\n";
        $string .= "Доступ: {$item->getStatus($item)}\nДата создания записи: {$item->getCreateAt()}\nДата изменения записи: {$item->getUpdateAt()}";
        $string .= ($item instanceof Admin) ? "\nПрава: {$item->getRole($item)}" : '';

        return $string;
    }
}
