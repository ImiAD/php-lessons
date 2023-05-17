<?php
declare(strict_types=1);

namespace App\Users\Admin\Customer;

class Date
{
    public static function format(string $format, string $value): string
    {
        return date($format, strtotime($value));
    }
}
