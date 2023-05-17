<?php

namespace App\Orders\Item;

use App\Orders\Contracts\Items;

class GetItem extends Item implements Items
{
    public function getItems(): array
    {
        return $this->items;
    }

    public function getItemCount(): int
    {
        return count($this->items);
    }
}