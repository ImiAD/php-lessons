<?php

namespace oldTests\Orders;

use App\Orders\Item\GetItem;
use PHPUnit\Framework\TestCase;

class GetItemTest extends TestCase
{
    public function testGetItemCount(): void
    {
        $item = new GetItem();
        $this->assertEquals(2, $item->getItemCount());
    }

    public function testGetItems(): void
    {
        $item = new GetItem();
        $item->item = [
            'title' => 'books',
            'price' => 5,
        ];
        $this->assertEquals($item->item, $item->getItems());
    }

}
