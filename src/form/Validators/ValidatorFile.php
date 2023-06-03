<?php
declare(strict_types=1);

namespace App\form\Validators;

class ValidatorFile extends Validator
{
    protected const FILE_SIZE = 1;
    protected const WHITE_LIST = ['jpg', 'png', 'txt'];

    public function check(): void
    {
        if ($this->data['error']) {
            $this->setErrors('error', 'Ошибка загрузки файла.');
        }

        if (empty($this->data['name'])) {
            $this->setErrors('name', 'Выберите файл для загрузки.');
        }

        if ($this->data['size'] > static::FILE_SIZE) {
            $this->setErrors('size', 'Большой размер файла.');
        }

        /*
         * Что бы протестировать проверку на наличие файла для загрузки, приходится комментировать
         * метод getExtension().
         * */
        if (!in_array($this->getExtension(), static::WHITE_LIST)) {
            $this->setErrors('extension', 'Не верный формат файла.');
        }
    }

    public function setErrors(string $key, string $value): void
//    protected function setErrors(string $key, string $value): void
    {
        if (!array_key_exists($key, $this->getErrors())) {
            $this->errors[$key] = $value;
        }
    }

    public function getExtension(): string
//    protected function getExtension(): string
    {
        return strtolower(pathinfo($this->data['name'], PATHINFO_EXTENSION));
    }
}
