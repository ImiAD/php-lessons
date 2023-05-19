<?php
declare(strict_types=1);

namespace App;

class Order
{
    private Discount $discount;
    private array $items = [];
    private float $discountOrder;

    public function __construct(Discount $discount, float $discountOrder)
    {
        $this->discount = $discount;
        $this->discountOrder = $discountOrder;
    }

    public function getDiscount():Discount
    {
        return $this->discount;
    }

    public function getItem(): array
    {
        return $this->items;
    }

    public function getDiscountOrder(): float
    {
        return $this->discountOrder;
    }

    public function add(OrderItem $item): void
    {
        $this->items[] = $item;
    }

    public function calculate(): float
    {
        $result = 0;
        foreach ($this->getItem() as $item) {
           $result += $item->calculate($this);
        }

        return $result;
    }
}
