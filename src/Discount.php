<?php
declare(strict_types=1);

namespace App;

class Discount
{
    public function apply(OrderItem $item): float
    {
        return ($item->getFullPriceWithoutDiscount() - $this->get($item));
    }

    public function get(OrderItem $item): float
    {
        return ($item->getFullPriceWithoutDiscount() * $item->getDiscount() / 100);
    }
}
