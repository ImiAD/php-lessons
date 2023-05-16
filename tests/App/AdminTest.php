<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testCanCreateAdminObject(): void
    {
        $data = [
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'birthday' => '12-12-2000',
            'createAt' => '30-01-2023',
            'updateAt' => '02-02-2023',
            'isBan' => false,
            'isAdmin' => true,
        ];

        $item = Admin::create($data);

        $this->assertInstanceOf(User::class, $item);
        $this->assertInstanceOf(Admin::class, $item);

        $this->assertNull($item->getId());

        $this->assertIsString($item->getFirstName());
        $this->assertIsString($item->getLastName());
        $this->assertIsString($item->getBirthday());
        $this->assertIsString($item->getCreateAt());
        $this->assertIsString($item->getUpdateAt());
        $this->assertIsString($item->getTableName());

        $test = [
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
            'birthday' => '2000-12-12',
            'createAt' => '2023-01-30',
            'updateAt' => '2023-02-02',
            'status' => 'Не заблокирован',
            'role' => 'Администратор',
            'tableName' => 'admins',
//            'selectAllStr' => 'SELECT * FROM admins ORDER BY first_name DESC',
            'selectAllStr' => 'SELECT * FROM admins ORDER BY first_name ASC',
            'selectOneStr' => 'SELECT * FROM admins WHERE id = 2',
            'insertStr' => 'INSERT INTO admins(first_name, last_name, birthday) VALUES Mishanya, XXX, 1752-08-22',
            'updateStr' => 'UPDATE admins SET first_name = Foma WHERE id = 12',
            'deleteStr' => 'DELETE admins WHERE id = 22 LIMIT 1',
//            'DESC' => true,
            'DESC' => false,
            'first_name' => 'first_name',
        ];

        $selectOne = [
            'id' => '2',
        ];

        $this->assertIsString($item->getAll($item, $test));
        $this->assertIsString($item->getOne($item, $selectOne));

        $insert = [
            'firstName' => 'Mishanya',
            'lastName' => 'XXX',
            'birthday' => '1752-08-22',
        ];

        $this->assertIsString($item->insert($item, $insert));

        $update = [
            'id' => 12,
            'firstName' => 'Foma',
        ];

        $this->assertIsString($item->update($item, $update));

        $delete = 22;

        $this->assertIsString($item->delete($item, $delete));

        $this->assertIsBool($item->getIsBan());
        $this->assertFalse($item->getIsBan());
        $this->assertIsBool($item->getIsAdmin());
        $this->assertTrue($item->getIsAdmin());

        $this->assertEquals($test['firstName'], $item->getFirstName());
        $this->assertEquals($test['lastName'], $item->getLastName());
        $this->assertEquals($test['birthday'], $item->getBirthday());
        $this->assertEquals($test['createAt'], $item->getCreateAt());
        $this->assertEquals($test['updateAt'], $item->getUpdateAt());
        $this->assertEquals($test['tableName'], $item->getTableName());
        $this->assertEquals($test['selectAllStr'], $item->getAll($item, $test));
        $this->assertEquals($test['selectOneStr'], $item->getOne($item, $selectOne));
        $this->assertEquals($test['insertStr'], $item->insert($item, $insert));
        $this->assertEquals($test['updateStr'], $item->update($item, $update));
        $this->assertEquals($test['deleteStr'], $item->delete($item, $delete));

        $dataTest = [
            'id' => 5,
            'firstName' => 'Max',
            'lastName' => 'Maximenko',
            'birthday' => '1999-01-25',
            'createAt' => '1900-02-10',
            'updateAt' => '1999-02-03',
            'isBan' => true,
            'isAdmin' => false,
        ];

        $item->setId($dataTest['id']);
        $item->setFirstName($dataTest['firstName']);
        $item->setLastName($dataTest['lastName']);
        $item->setBirthday($dataTest['birthday']);
        $item->setCreateAt($dataTest['createAt']);
        $item->setUpdateAt($dataTest['updateAt']);
        $item->setIsBan($dataTest['isBan']);
        $item->setIsAdmin($dataTest['isAdmin']);

        $this->assertIsInt($item->getId());

        $this->assertIsString($item->getFirstName());
        $this->assertIsString($item->getLastName());
        $this->assertIsString($item->getBirthday());
        $this->assertIsString($item->getCreateAt());
        $this->assertIsString($item->getUpdateAt());

        $this->assertIsBool($item->getIsBan());
        $this->assertIsBool($item->getIsAdmin());
        $this->assertTrue($item->getIsBan());
        $this->assertFalse($item->getIsAdmin());

        $this->assertEquals($dataTest['id'], $item->getId());
        $this->assertEquals($dataTest['firstName'], $item->getFirstName());
        $this->assertEquals($dataTest['lastName'], $item->getLastName());
        $this->assertEquals($dataTest['birthday'], $item->getBirthday());
        $this->assertEquals($dataTest['createAt'], $item->getCreateAt());
        $this->assertEquals($dataTest['updateAt'], $item->getUpdateAt());

        $data['id'] = '2';

        $item = Admin::create($data);

        $this->assertIsInt($item->getId());

        $this->assertIsString($item->getStatus($item));
        $this->assertIsString($item->getRole($item)); // Почему он выделяет передаваемый объект?

        $this->assertEquals($data['id'], $item->getId());
        $this->assertEquals($test['status'], $item->getStatus($item));
        $this->assertEquals($test['role'], $item->getRole($item)); // Почему он выделяет передаваемый объект?
    }
}
