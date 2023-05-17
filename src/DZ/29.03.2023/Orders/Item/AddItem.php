<?php

namespace App\Orders\Item;

use App\Orders\Contracts\Items;

class AddItem extends Item implements Items
{
    public function addItem(array $item): array
    {
        return $this->items[] = $item;
    }
}