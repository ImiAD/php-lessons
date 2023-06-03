<?php
declare(strict_types=1);

namespace App\form\Validators;

abstract class Validator
{
    protected array $data = [];
//    protected array $errors = [];
    public array $errors = [];

    public function load(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
