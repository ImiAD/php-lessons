<?php
declare(strict_types=1);

namespace App;

class ConvertBoolToString
{
    public static function convertIsBan(User $value): string
    {
        return $isBan = $value->getIsBan() ? 'Заблокирован' : 'Не заблокирован';
    }

    public static function convertIsAdmin(User $value): string
    {
        return $isAdmin = $value->getIsAdmin() ? 'Администратор' : 'Пользователь';
    }
}
