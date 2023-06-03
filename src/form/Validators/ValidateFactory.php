<?php
declare(strict_types=1);

namespace App\form\Validators;

final class ValidateFactory
{
    public static function create(string $extensions): ValidatorFile
    {
        return match ($extensions) {
            'txt' => new ValidatorTextFile(),
            default => new ValidatorImageFile(),
        };
    }
}