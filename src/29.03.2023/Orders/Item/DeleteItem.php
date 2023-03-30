<?php

namespace App\Orders\Item;

use App\Orders\Contracts\Items;

class DeleteItem extends Item implements Items
{
    public function deleteItem(string|int $itemNumber): array
    {
        unset($this->items[$itemNumber]);

        return $this->items;
    }
}