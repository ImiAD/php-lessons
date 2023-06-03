<?php
declare(strict_types=1);

namespace App\form\Validators;

use PHPUnit\Framework\TestCase;

class ValidatorFileTest extends TestCase
{
    public function testCanCreateValidatorFile(): void
    {
        $data = [
            'error' => '111111111',
//            'name' => 'name.txt',
            'email' => 'emailtest.ru',
            'size' => 1011111102384750,
//            'extension' => 'txt',
        ];
        $errors = [
            'error' => 'Ошибка загрузки файла.',
            'name' => 'Выберите файл для загрузки.',
            'size' => 'Большой размер файла.',
//            'extension' => 'Не верный формат файла.',
        ];

        $validator = new ValidatorFile();

        $this->assertIsObject($validator);
        $this->assertInstanceOf(ValidatorFile::class, $validator);

        $validator->load($data);

        /*
         * В тесте я могу обратиться к методу, а в index.php нет!!!
         var_dump($validator->getExtension());die;
         * */

        $this->assertIsArray($validator->toArray());
        $this->assertIsArray($validator->getErrors());
        $this->assertEquals($data, $validator->toArray());

        $validator->check();

        $this->assertEquals($errors, $validator->getErrors());
    }

    public function testCanCreateValidatorForm(): void
    {
        $dataInvalid = [
            'name' => '        name',
            'email' => '     email@test.ru      ',
        ];
        $dataInvalidEmail = [
            'name' => 'name',
            'email' => 'emailtest.ru',
        ];
        $dataEmpty = [
            'name' => '',
            'email' => '',
        ];
        $dataValid = [
            'name' => 'name',
            'email' => 'email@test.ru',
        ];
        $errorsEmpty = [
            'name' => 'Заполните поле Имя.',
            'email' => 'Заполните поле E-mail.',
        ];
        $noErrors = [];
        $errorsInvalidEmail = ['invalid_email' => 'Введенный E-mail не верный.'];

        $validator = new ValidatorForm();

        $this->assertIsObject($validator);
        $this->assertInstanceOf(ValidatorForm::class, $validator);

        $validator->load($dataInvalid);

        $this->assertIsArray($validator->toArray());
        $this->assertIsArray($validator->getErrors());

        $this->assertEquals($dataInvalid, $validator->toArray());
        $this->assertEquals($noErrors, $validator->getErrors());

        $validator->clear();

        $this->assertEquals($dataValid, $validator->toArray());

        $validator->load($dataEmpty);
        $validator->isEmpty();

        $this->assertEquals($errorsEmpty, $validator->getErrors());

        unset($validator->errors);
        $validator->except($errorsEmpty['name'], $errorsEmpty['email']);

        $validator->load($dataInvalidEmail);
        $validator->isValidEmail();

        $this->assertEquals($errorsInvalidEmail, $validator->getErrors());

        $validator->except('name', 'email');

        $this->assertEquals([], $validator->toArray());
    }
}
