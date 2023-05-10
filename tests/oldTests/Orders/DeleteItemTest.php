<?php

namespace oldTests\Orders;

use App\Orders\Item\DeleteItem;
use PHPUnit\Framework\TestCase;

class DeleteItemTest extends TestCase
{
    public function testDeleteItem(): void
    {
        $deleteItem = new DeleteItem();
        $items = 'price';
        $newItems = [
            'title' => 'books',
        ];
        $this->assertEquals($newItems, $deleteItem->deleteItem($items));
//        var_dump($order->items);
    }
}
