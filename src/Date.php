<?php
declare(strict_types=1);

namespace App;

class Date
{
    public static function format(string $format, string $value): string
    {
        return date($format, strtotime($value));
    }
}
