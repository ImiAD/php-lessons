<?php
declare(strict_types=1);

namespace App;

class Discount
{
    public function apply(OrderItem $item): float
    {
        $price = $item->getPrice() * $item->getQuantity();

        return $price - ($price * $item->getDiscount() / 100);
    }

    public function get(OrderItem $item): float
    {
        return ($item->getPrice() * $item->getQuantity()  * $item->getDiscount() / 100);
    }
}
