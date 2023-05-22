<?php
declare(strict_types=1);

namespace App;

class Discount
{
    public function apply(OrderItem $item): float
    {
        return ($item->getFullPrice() - $this->get($item));
    }

    public function get(OrderItem $item): float
    {
        return ($item->getFullPrice() * $item->getDiscount() / 100);
    }
}
