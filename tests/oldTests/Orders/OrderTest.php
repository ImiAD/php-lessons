<?php

namespace oldTests\Orders;

use App\Orders\Order\Calculator;
use App\Orders\Order\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testPrintOrder(): void
    {
        $order = new Order;
        $calculator = new Calculator();
        $customer = 'Заказчик: ' . $order->customer;
        $sumOrder = ' Сумма заказа: ' . $calculator->calculateTotalSum();
        $this->assertEquals(
            $customer . $sumOrder,
            $order->printOrder()
        );

    }

    public function testShowOrder(): void
    {
        $order = new Order;
        $calculator = new Calculator();
        $customer = 'Заказчик: ' . $order->customer;
        $sumOrder = ' Сумма заказа: ' . $calculator->calculateTotalSum();
        $this->assertEquals(
            $customer . $sumOrder,
            $order->showOrder()
        );
    }


}
