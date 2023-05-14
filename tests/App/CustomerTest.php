<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testCanCreateCustomerObject(): void
    {
        $data = [
            'firstName' => 'Rim',
            'lastName' => 'Gobkin',
            'birthday' => '12-02-1989',
            'createAt' => '23-02-2021',
            'updateAt' => '25-02-2021',
            'isBan' => false,
        ];

        $test = [
            'birthday' => '1989-02-12',
            'createAt' => '2021-02-23',
            'updateAt' => '2021-02-25',
            'status' => 'Не заблокирован',
            'tableName' => 'customers',
            'selectAllStr' => 'SELECT * FROM customers first_name ORDER BY DESC',
            'selectOneStr' => 'SELECT 678 FROM customers',
            'insertStr' => 'INSERT INTO customers VALUES id = 54, first_name = Kleopatra, last_name = Aleksandryiskay',
            'updateStr' => 'UPDATE customers SET first_name = false WHERE id = 34',
            'deleteStr' => 'DELETE customers WHERE id = 51',
            'DESC' => true,
            'firstName' => 'first_name',
        ];

        $selectOne = [
            'id' => 678,
        ];

        $insert = [
            'id' => '54',
            'firstName' => 'Kleopatra',
            'lastName' => 'Aleksandryiskay',
        ];

        $update = [
            'id' => '34',
            'firstName' => 'false',
        ];

        $delete = 51;

        $item = Customer::create($data);

        $this->assertInstanceOf(User::class, $item);
        $this->assertInstanceOf(Customer::class, $item);

        $this->assertIsString($item->getTableName());
        $this->assertIsString($item->getFirstName());
        $this->assertIsString($item->getLastName());
        $this->assertIsString($item->getBirthday());
        $this->assertIsString($item->getCreateAt());
        $this->assertIsString($item->getUpdateAt());
        $this->assertIsString($item->getStatus($item));

        $this->assertIsString($item->getAll($item, $test));
        $this->assertIsString($item->getOne($item, $selectOne));
        $this->assertIsString($item->insert($item, $insert));
        $this->assertIsString($item->update($item, $update));
        $this->assertIsString($item->delete($item, $delete));

        $this->assertIsBool($item->getIsBan());
        $this->assertFalse($item->getIsBan());

        $this->assertEquals($data['firstName'], $item->getFirstName());
        $this->assertEquals($data['lastName'], $item->getLastName());

        $this->assertEquals($test['birthday'], $item->getBirthday());
        $this->assertEquals($test['createAt'], $item->getCreateAt());
        $this->assertEquals($test['updateAt'], $item->getUpdateAt());
        $this->assertEquals($test['status'], $item->getStatus($item));
        $this->assertEquals($test['tableName'], $item->getTableName());
        $this->assertEquals($test['selectAllStr'], $item->getAll($item, $test));
        $this->assertEquals($test['selectOneStr'], $item->getOne($item, $selectOne));
        $this->assertEquals($test['insertStr'], $item->insert($item, $insert));
        $this->assertEquals($test['updateStr'], $item->update($item, $update));
        $this->assertEquals($test['deleteStr'], $item->delete($item, $delete));

        $dataTest = [
            'id' => 12,
            'firstName' => 'Michail',
            'lastName' => 'Shumakher',
            'birthday' => '12-04-1966',
            'createAt' => '28-01-2021',
            'updateAt' => '12-03-2022',
            'isBan' => true,
            'status' => 'Заблокирован',
        ];

        $item->setId($dataTest['id']);
        $item->setFirstName($dataTest['firstName']);
        $item->setLastName($dataTest['lastName']);
        $item->setBirthday($dataTest['birthday']);
        $item->setCreateAt($dataTest['createAt']);
        $item->setUpdateAt($dataTest['updateAt']);
        $item->setIsBan($dataTest['isBan']);

        $this->assertIsInt($item->getId());

        $this->assertIsString($item->getFirstName());
        $this->assertIsString($item->getLastName());
        $this->assertIsString($item->getBirthday());
        $this->assertIsString($item->getCreateAt());
        $this->assertIsString($item->getUpdateAt());

        $this->assertIsBool($item->getIsBan());
        $this->assertTrue($item->getIsBan());

        $this->assertEquals($dataTest['id'], $item->getId());
        $this->assertEquals($dataTest['firstName'], $item->getFirstName());
        $this->assertEquals($dataTest['lastName'], $item->getLastName());
        $this->assertEquals($dataTest['birthday'], $item->getBirthday());
        $this->assertEquals($dataTest['createAt'], $item->getCreateAt());
        $this->assertEquals($dataTest['updateAt'], $item->getUpdateAt());
        $this->assertEquals($dataTest['status'], $item->getStatus($item));

        $data['id'] = '34';

        $item = Customer::create($data);

        $this->assertIsInt($item->getId());

        $this->assertEquals($data['id'], $item->getId());
    }
}
