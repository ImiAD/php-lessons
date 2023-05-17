<?php
declare(strict_types=1);

namespace App\User\Admin\Customer;

use App\Users\Admin\Customer\Admin;
use App\Users\Admin\Customer\Customer;
use App\Users\Admin\Customer\UserWriter;
use PHPUnit\Framework\TestCase;

class UserWriterTest extends TestCase
{
    public function testCanCreateAdminWriter(): void
    {
        $data = [
            'firstName' => 'Grinnay',
            'lastName' => 'Grafinov',
            'birthday' => '05-05-1900',
            'createAt' => '23-09-2020',
            'updateAt' => '12-09-2032',
            'isBan' => true,
            'isAdmin' => false,
        ];

        $dataTest = "Имя: Grinnay\nФамилия: Grafinov\nДата рождения: 05-05-1900\nДоступ: Заблокирован\nДата создания записи: 23-09-2020\nДата изменения записи: 12-09-2032\nПрава: Пользователь";

        $item = Admin::create($data);
        $adminWriter = UserWriter::write($item);

        $this->assertIsString($adminWriter);

        $this->assertEquals($dataTest, $adminWriter);


        $data = [
            'id' => 111,
            'firstName' => 'Pilot',
            'lastName' => 'Barinov',
            'birthday' => '15-02-1987',
            'createAt' => '01-02-2023',
            'updateAt' => '03-03-2023',
            'isBan' => false,
            'isAdmin' => true,
        ];

        $dataTest = "id: 111 \nИмя: Pilot\nФамилия: Barinov\nДата рождения: 15-02-1987\nДоступ: Не заблокирован\nДата создания записи: 01-02-2023\nДата изменения записи: 03-03-2023\nПрава: Администратор";

        $item = Admin::create($data);
        $writer = UserWriter::write($item);

        $this->assertIsString($writer);

        $this->assertEquals($dataTest, $writer);
    }

    public function testCanCreateCustomer(): void
    {
        $data = [
            'firstName' => 'Dumbo',
            'lastName' => 'Pitonov',
            'birthday' => '25-03-1754',
            'createAt' => '21-10-1918',
            'updateAt' => '14-11-1932',
            'isBan' => false,
            'isAdmin' => false,
        ];

        $dataTest = "Имя: Dumbo\nФамилия: Pitonov\nДата рождения: 25-03-1754\nДоступ: Не заблокирован\nДата создания записи: 21-10-1918\nДата изменения записи: 14-11-1932";

        $item = Customer::create($data);
        $writer = UserWriter::write($item);

        $this->assertIsString($writer);

        $this->assertEquals($dataTest, $writer);

        $data = [
            'id' => 454,
            'firstName' => 'Tt',
            'lastName' => 'Ralvizo',
            'birthday' => '29-04-1876',
            'createAt' => '19-12-1912',
            'updateAt' => '10-09-2000',
            'isBan' => true,
            'isAdmin' => false,
        ];

        $dataTest = "id: 454 \nИмя: Tt\nФамилия: Ralvizo\nДата рождения: 29-04-1876\nДоступ: Заблокирован\nДата создания записи: 19-12-1912\nДата изменения записи: 10-09-2000";

        $item = Customer::create($data);
        $writer = UserWriter::write($item);

        $this->assertIsString($writer);

        $this->assertEquals($dataTest, $writer);
    }
}
