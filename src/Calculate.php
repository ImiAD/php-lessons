<?php
declare(strict_types=1);

namespace App;
// Тоже класс сервис?
class Calculate
{
    public function makeSum(Order $items): float
    {
        $sum = 0;
        foreach ($items->getItems() as $item) {
            $sumOrderWithoutDiscount = $item->getPrice() * $item->getQuantity();
            $sum += $item->getDiscount() ? $sumOrderWithoutDiscount - $item->getSumDiscount() : $sumOrderWithoutDiscount;
        }

        return $sum;
    }
}
