<?php
declare(strict_types=1);

namespace App\form\Validators;

use PHPUnit\Framework\TestCase;

class ValidateFactoryTest extends TestCase
{
    public function testCanCreateValidate(): void
    {
        $data = [
            'txt' => 'txt',
            'jpg' => 'jpg',
            'png' => 'png',
        ];

        foreach ($data as $value) {
            if ($value !== 'txt') {
                $validator = ValidateFactory::create($value);

                $this->assertIsObject($validator);
                $this->assertInstanceof(Validator::class, $validator);
                $this->assertInstanceOf(ValidatorFile::class, $validator);
                $this->assertInstanceof(ValidatorImageFile::class, $validator);
            } else {
                $validator = ValidateFactory::create($value);

                $this->assertIsObject($validator);
                $this->assertInstanceOf(Validator::class, $validator);
                $this->assertInstanceOf(ValidatorFile::class, $validator);
                $this->assertInstanceOf(ValidatorTextFile::class, $validator);
            }
        }
    }
}
