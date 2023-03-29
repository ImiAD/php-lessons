<?php

namespace App\Orders\Item;

use App\Orders\Contracts\Items;

abstract class Item implements Items
{
    public array $items = [
        'title' => 'books',
        'price' => 5,
    ];
}
