<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testDataForCreateOrder(): \StdClass
    {
        $car = [
            'title' => 'Car',
            'price' => '10',
            'quantity' => '2',
            'discount' => '10',
        ];

        $pan = [
            'title' => 'Pan',
            'price' => '1',
            'quantity' => '5',
            'discount' => '0',
        ];

        $sumDiscount = [
            'car' => 2.0,
        ];

        $sumOrder = [
            'sumOrder' => 23,
        ];

        $discount = new Discount();

        $this->assertIsArray($car);
        $this->assertIsArray($pan);
        $this->assertIsArray($sumDiscount);
        $this->assertIsArray($sumOrder);
        $this->assertIsObject($discount);
        $this->assertInstanceOf(Discount::class, $discount);

        $dataForOrder = new \StdClass();
        $dataForOrder->car = $car;
        $dataForOrder->pan = $pan;
        $dataForOrder->sumDiscount = $sumDiscount;
        $dataForOrder->sumOrder = $sumOrder;
        $dataForOrder->discount = $discount;

        $this->assertIsObject($dataForOrder);
        $this->assertInstanceOf(\StdClass::class, $dataForOrder);

        $this->assertEquals($car, $dataForOrder->car);
        $this->assertEquals($pan, $dataForOrder->pan);
        $this->assertEquals($sumDiscount, $dataForOrder->sumDiscount);
        $this->assertEquals($sumOrder, $dataForOrder->sumOrder);

        return $dataForOrder;
    }

    /**
     * @depends testDataForCreateOrder
     * @return array
     */
    public function testCanCreateOrderItemObject(\StdClass $dataForOrder): array
    {
        $orderCar = new OrderItem($dataForOrder->car);

        $this->assertIsObject($orderCar);
        $this->assertInstanceof(OrderItem::class, $orderCar);

        $this->assertIsString($orderCar->getTitle());
        $this->assertIsFloat($orderCar->getPrice());
        $this->assertIsInt($orderCar->getQuantity());
        $this->assertIsInt($orderCar->getDiscount());
        $this->assertIsBool($orderCar->hasDiscount());
        $this->assertTrue($orderCar->hasDiscount());

        $this->assertEquals($dataForOrder->car['title'], $orderCar->getTitle());
        $this->assertEquals($dataForOrder->car['price'], $orderCar->getPrice());
        $this->assertEquals($dataForOrder->car['quantity'], $orderCar->getQuantity());
        $this->assertEquals($dataForOrder->car['discount'], $orderCar->getDiscount());

        $orderPan = new OrderItem($dataForOrder->pan);

        $this->assertIsObject($orderPan);
        $this->assertInstanceOf(OrderItem::class, $orderPan);

        $this->assertIsString($orderPan->getTitle());
        $this->assertIsFloat($orderPan->getPrice());
        $this->assertIsInt($orderPan->getQuantity());
        $this->assertIsInt($orderPan->getDiscount());
        $this->assertIsBool($orderPan->hasDiscount());
        $this->assertFalse($orderPan->hasDiscount());

        $this->assertEquals($dataForOrder->pan['title'], $orderPan->getTitle());
        $this->assertEquals($dataForOrder->pan['price'], $orderPan->getPrice());
        $this->assertEquals($dataForOrder->pan['quantity'], $orderPan->getQuantity());
        $this->assertEquals($dataForOrder->pan['discount'], $orderPan->getDiscount());

        return $orderItem = [
            'Car' => $orderCar,
            'Pan' => $orderPan,
        ];
    }

    /**
     * @depends testDataForCreateOrder
     * @depends testCanCreateOrderItemObject
     * @return void
     */
    public function testCanCreateDiscountObject(\StdClass $dataForOrder, array $orderItem): void
    {
        $this->assertIsObject($dataForOrder->discount);
        $this->assertInstanceOf(Discount::class, $dataForOrder->discount);

        $this->assertEquals($dataForOrder->sumDiscount['car'], $dataForOrder->discount->get($orderItem['Car']));
    }

    /**
     * @depends testDataForCreateOrder
     * @depends testCanCreateOrderItemObject
     * @return void
     */
    public function testCanCreateOrderObject(\StdClass $dataForOrder, array $orderItem): Order
    {
        $order = new Order($dataForOrder->discount);

        $this->assertIsObject($order);
        $this->assertInstanceOf(Order::class, $order);

        $order->add($orderItem['Car']);
        $order->add($orderItem['Pan']);

        $this->assertIsFloat($order->calculate());

        $this->assertEquals($dataForOrder->sumOrder['sumOrder'], $order->calculate());

        return $order;
    }
}
