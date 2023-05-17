<?php

namespace App\Orders\Order;

use App\Orders\Contracts\Orders;

class Order implements Orders
{
    public string $customer = 'Ivan';

    public function printOrder(): string
    {
        return $this->showOrder();
    }

    public function showOrder(): string
    {
        $calculator = new Calculator();

        return
            'Заказчик: '
            . $this->customer
            . ' Сумма заказа: '
            . $calculator->calculateTotalSum();
    }
}
