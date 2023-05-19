<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testCanCreateOrder(): void
    {
        $dataForCreateOrderItemObjectVolga = [
            'title' => 'Volga',
            'price' => '100',
            'quantity' => '3',
            'discount' => '20',
        ];

        $this->assertIsArray($dataForCreateOrderItemObjectVolga);

        $dataTestArrayCount = [
            'countVolga' => 4,
            'countNiva' => 4,
        ];

        $this->assertCount( $dataTestArrayCount['countVolga'],$dataForCreateOrderItemObjectVolga);

        $dataForCreateOrderItemObjectNiva = [
            'title' => 'Niva',
            'price' => '50',
            'quantity' => '2',
            'discount' => '0',
        ];

        $dataTestDiscountOrderItemObject =[
            'fullPriceWithoutDiscountVolga' => '300',
            'fullPriceWithoutDiscountNiva' => '100',
        ];

        $this->assertIsArray($dataForCreateOrderItemObjectNiva);
        $this->assertCount($dataTestArrayCount['countNiva'], $dataForCreateOrderItemObjectNiva);

        $orderItemVolga = new OrderItem($dataForCreateOrderItemObjectVolga);

        $this->assertIsObject($orderItemVolga);
        $this->assertInstanceOf(OrderItem::class, $orderItemVolga);
        $this->assertIsString($orderItemVolga->getTitle());
        $this->assertIsFloat($orderItemVolga->getPrice());
        $this->assertIsInt($orderItemVolga->getQuantity());
        $this->assertIsFloat($orderItemVolga->getDiscount());
        $this->assertIsBool($orderItemVolga->hasDiscount());
        $this->assertTrue($orderItemVolga->hasDiscount());
        $this->assertIsFloat($orderItemVolga->getFullPriceWithoutDiscount());

        $this->assertEquals($dataForCreateOrderItemObjectVolga['title'], $orderItemVolga->getTitle());
        $this->assertEquals($dataForCreateOrderItemObjectVolga['price'], $orderItemVolga->getPrice());
        $this->assertEquals($dataForCreateOrderItemObjectVolga['quantity'], $orderItemVolga->getQuantity());
        $this->assertEquals($dataForCreateOrderItemObjectVolga['discount'], $orderItemVolga->getDiscount());
        $this->assertEquals($dataTestDiscountOrderItemObject['fullPriceWithoutDiscountVolga'], $orderItemVolga->getFullPriceWithoutDiscount());

        $orderItemNiva = new OrderItem($dataForCreateOrderItemObjectNiva);

        $this->assertIsObject($orderItemNiva);
        $this->assertInstanceOf(OrderItem::class, $orderItemNiva);
        $this->assertIsString($orderItemNiva->getTitle());
        $this->assertIsFloat($orderItemNiva->getPrice());
        $this->assertIsInt($orderItemNiva->getQuantity());
        $this->assertIsFloat($orderItemNiva->getDiscount());
        $this->assertIsBool($orderItemNiva->hasDiscount());
        $this->assertFalse($orderItemNiva->hasDiscount());
        $this->assertIsFloat($orderItemNiva->getFullPriceWithoutDiscount());

        $this->assertEquals($dataForCreateOrderItemObjectNiva['title'], $orderItemNiva->getTitle());
        $this->assertEquals($dataForCreateOrderItemObjectNiva['price'], $orderItemNiva->getPrice());
        $this->assertEquals($dataForCreateOrderItemObjectNiva['quantity'], $orderItemNiva->getQuantity());
        $this->assertEquals($dataForCreateOrderItemObjectNiva['discount'], $orderItemNiva->getDiscount());
        $this->assertEquals($dataTestDiscountOrderItemObject['fullPriceWithoutDiscountNiva'], $orderItemNiva->getFullPriceWithoutDiscount());

        $dataTestDiscountObject = [
            'appleVolga' => '240',
            'getVolga' => '60',
            'appleNiva' => '100',
            'getNiva' => '0',
        ];

        $discountVolga = new Discount();

        $this->assertIsObject($discountVolga);
        $this->assertInstanceOf(Discount::class, $discountVolga);

        $this->assertIsFloat($discountVolga->apply($orderItemVolga));
        $this->assertIsFloat($discountVolga->get($orderItemVolga));

        $this->assertEquals($dataTestDiscountObject['appleVolga'], $discountVolga->apply($orderItemVolga));
        $this->assertEquals($dataTestDiscountObject['getVolga'], $discountVolga->get($orderItemVolga));

        $discountNiva = new Discount();

        $this->assertIsObject($discountNiva);
        $this->assertInstanceOf(Discount::class, $discountNiva);

        $this->assertIsFloat($discountNiva->apply($orderItemNiva));
        $this->assertIsFloat($discountNiva->get($orderItemNiva));

        $this->assertEquals($dataTestDiscountObject['appleNiva'], $discountNiva->apply($orderItemNiva));
        $this->assertEquals($dataTestDiscountObject['getNiva'], $discountNiva->get($orderItemNiva));

        $dataCreateOrderObject = [
            'discountObjectClass' => new Discount(),
            'discountOrder' => 10,
//            'discountOrder' => 0,
        ];

        $order = new Order($dataCreateOrderObject['discountObjectClass'], $dataCreateOrderObject['discountOrder']);

        $this->assertIsObject($order);
        $this->assertInstanceOf(Order::class, $order);

        $order->add($orderItemVolga);
        $order->add($orderItemNiva);

        $dataTestOrderObject = [
            'getItems' => [
                $orderItemVolga,
                $orderItemNiva,
            ],
            'getDiscount' => new Discount(),
            'calculate' => '360', // если ЕСТЬ скидка на ВЕСЬ заказ
//            'calculate' => '340', // если сидка на отдельные товары
        ];

        $this->assertEquals($dataTestOrderObject['getItems'], $order->getItem());
        $this->assertEquals($dataTestOrderObject['getDiscount'], $order->getDiscount());
        $this->assertEquals($dataTestOrderObject['calculate'], $order->calculate());
    }
}
