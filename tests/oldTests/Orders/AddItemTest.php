<?php

namespace oldTests\Orders;

use App\Orders\Item\AddItem;
use PHPUnit\Framework\TestCase;

class AddItemTest extends TestCase
{
    public function testAddItem(): void
    {
        $addItem = new AddItem;
        $items = ['price2' => 23];
        $items1 = [];
//        var_dump($items);
//        var_dump($order->items);
//        var_dump($order->addItem($items));
//        var_dump($order->items);
        $this->assertEquals($items, $addItem->addItem($items));
    }

}