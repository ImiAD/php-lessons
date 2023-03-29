<?php

namespace App\Orders\Order;

use App\Orders\Contracts\Orders;

class Calculator implements Orders
{
    public function calculateTotalSum(): int
    {
        return 1 + 1;
    }
}