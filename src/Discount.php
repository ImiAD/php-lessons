<?php
declare(strict_types=1);

namespace App;
// Этот класс и называется Сервис? Как я понял Сервис - это класс, который по сути является функцией.
class Discount
{
    public function getSum(OrderItems $item): float
    {
        return ($item->getPrice() * $item->getQuantity() * $item->getDiscount() / 100);
    }
}
