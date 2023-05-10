<?php

namespace App\Orders;

use App\Orders\Order\OrderCrud;
use PHPUnit\Framework\TestCase;

class OrderCrudTest extends TestCase
{
    public function testLoad(): void
    {
        $orderCrud = new OrderCrud;
        $load = ['customer' => 'Ivan'];
        var_dump($orderCrud->data);
        $this->assertEquals($orderCrud->data, $orderCrud->load($load));
        var_dump($orderCrud->data);
    }

    public function testSave(): void
    {
        $order = new OrderCrud;
        $param = 'data';
        $value = 'valueS';
        $this->assertEquals($order->save($param, $value), $order->save);
        var_dump($order->save);
    }

    public function testUpdate(): void
    {
        $order = new OrderCrud;
        $save = [
            'value' => 'string',
            'books' => 'War',
        ];
        $data = [
            'value' => 'string',
            'books' => 'War',
        ];
        var_dump($order->save);
        $this->assertEquals($save, $order->update($data));
        var_dump($order->save);
    }

    public function testDelete(): void
    {
        $order = new OrderCrud;
        $param = 'customer';
//        var_dump($order->data);
        $this->assertEquals($order->delete($param), $order->data);
//        var_dump($order->data);

    }
}
