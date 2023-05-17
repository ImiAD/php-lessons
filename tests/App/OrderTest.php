<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testDataForCreateOrder(): \StdClass
    {
        $Car = [
            'title' => 'Car',
            'price' => '10',
            'quantity' => '2',
            'discount' => '10',
        ];

        $Pan = [
            'title' => 'Pan',
            'price' => '1',
            'quantity' => '5',
            'discount' => '0',
        ];

        $sumDiscount = [
            'car' => 2.0,
        ];

        $calculate = [
            'sumOrder' => 23,
        ];

        $this->assertIsArray($Car);
        $this->assertIsArray($Pan);
        $this->assertIsArray($sumDiscount);
        $this->assertIsArray($calculate);

        $dataForOrder = new \StdClass();
        $dataForOrder->Car = $Car;
        $dataForOrder->Pan = $Pan;
        $dataForOrder->sumDiscount = $sumDiscount;
        $dataForOrder->calculate = $calculate;

        $this->assertIsObject($dataForOrder);
        $this->assertInstanceOf(\StdClass::class, $dataForOrder);

        $this->assertEquals($Car, $dataForOrder->Car);
        $this->assertEquals($Pan, $dataForOrder->Pan);
        $this->assertEquals($sumDiscount, $dataForOrder->sumDiscount);
        $this->assertEquals($calculate, $dataForOrder->calculate);

        return $dataForOrder;
    }

    /**
     * @depends testDataForCreateOrder
     * @return array
     */
    public function testCanCreateOrderItemsObject(\StdClass $dataForOrder): array
    {
        $orderCar = new OrderItems($dataForOrder->Car);

        $this->assertIsObject($orderCar);
        $this->assertInstanceof(OrderItems::class, $orderCar);

        $this->assertIsString($orderCar->getTitle());
        $this->assertIsFloat($orderCar->getPrice());
        $this->assertIsInt($orderCar->getQuantity());
        $this->assertIsInt($orderCar->getDiscount());
        $this->assertIsBool($orderCar->hasDiscount());
        $this->assertTrue($orderCar->hasDiscount());

        $this->assertEquals($dataForOrder->Car['title'], $orderCar->getTitle());
        $this->assertEquals($dataForOrder->Car['price'], $orderCar->getPrice());
        $this->assertEquals($dataForOrder->Car['quantity'], $orderCar->getQuantity());
        $this->assertEquals($dataForOrder->Car['discount'], $orderCar->getDiscount());

        if ($dataForOrder->Car['discount']) {
            $this->assertEquals($dataForOrder->sumDiscount['car'], $orderCar->getSumDiscount());
        }

        $orderPan = new OrderItems($dataForOrder->Pan);

        $this->assertIsObject($orderPan);
        $this->assertInstanceOf(OrderItems::class, $orderPan);

        $this->assertIsString($orderPan->getTitle());
        $this->assertIsFloat($orderPan->getPrice());
        $this->assertIsInt($orderPan->getQuantity());
        $this->assertIsInt($orderPan->getDiscount());
        $this->assertIsBool($orderPan->hasDiscount());
        $this->assertFalse($orderPan->hasDiscount());

        $this->assertEquals($dataForOrder->Pan['title'], $orderPan->getTitle());
        $this->assertEquals($dataForOrder->Pan['price'], $orderPan->getPrice());
        $this->assertEquals($dataForOrder->Pan['quantity'], $orderPan->getQuantity());
        $this->assertEquals($dataForOrder->Pan['discount'], $orderPan->getDiscount());

        if ($dataForOrder->Pan['discount']) {
            $this->assertEquals($dataForOrder->sumDiscount['pan'], $orderCar->getSumDiscount());
        }

        return $orderItems = [
            'Car' => $orderCar,
            'Pan' => $orderPan,
        ];
    }

    /**
     * @depends testDataForCreateOrder
     * @depends testCanCreateOrderItemsObject
     * @return void
     */
    public function testCanCreateDiscountObject(\StdClass $dataForOrder, array $orderItems): void
    {
        $discount = new Discount();

        $this->assertIsObject($discount);
        $this->assertInstanceOf(Discount::class, $discount);

        $this->assertEquals($dataForOrder->sumDiscount['car'], $discount->getSum($orderItems['Car']));
    }

    /**
     * @depends testDataForCreateOrder
     * @depends testCanCreateOrderItemsObject
     * @return void
     */
    public function testCanCreateOrderObject(\StdClass $dataForOrder, array $orderItems): Order
    {
        $order = new Order();

        $this->assertIsObject($order);
        $this->assertInstanceOf(Order::class, $order);

        $order->add($orderItems['Car']);
        $order->add($orderItems['Pan']);

        $this->assertIsFloat($order->calculate());

        $this->assertEquals($dataForOrder->calculate['sumOrder'], $order->calculate());

        return $order;
    }

    /**
     * @depends testDataForCreateOrder
     * @depends testCanCreateOrderObject
     * @return void
     */
    public function testCanCreateCalculate(\StdClass $dataForOrder, Order $order): void
    {
        $calculate = new Calculate();

        $this->assertIsObject($calculate);
        $this->assertInstanceOf(Calculate::class, $calculate);

        $this->assertIsFloat($calculate->makeSum($order));
        $this->assertEquals($dataForOrder->calculate['sumOrder'], $calculate->makeSum($order));
    }
}
