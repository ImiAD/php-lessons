<?php
declare(strict_types=1);

namespace App\form\Validators;

class ValidatorForm extends Validator
{
    private const ERRORS_NAME = [
        'name' => 'Заполните поле Имя.',
        'email' => 'Заполните поле E-mail.',
        'invalid_email' => 'Введенный E-mail не верный.',
    ];

    public function clear(): self
    {
        foreach ($this->data as $key => $value) {
            $this->data[$key] = htmlspecialchars(strip_tags(trim((string)$value)));
        }

        return $this;
    }

    public function isEmpty(): self
    {
        foreach ($this->data as $key => $value) {
            if (empty($value)) {
                $this->errors[$key] = self::ERRORS_NAME[$key];
            }
        }

        return $this;
    }

    public function isValidEmail(): self
    {
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['invalid_email'] = self::ERRORS_NAME['invalid_email'];
        }

        return $this;
    }

    public function except(...$values): self
    {
        foreach ($this->data as $key => $value) {
            if (in_array($key, $values)) {
                unset($this->data[$key]);
            }
        }

        return $this;
    }
}
