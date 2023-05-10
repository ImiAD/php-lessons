<?php

namespace App\Orders;

use App\Orders\Order\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculateTotalSum(): void
    {
        $calculator = new Calculator();
        $this->assertIsInt($calculator->calculateTotalSum());
        $this->assertEquals(2, $calculator->calculateTotalSum());
    }
}