<?php
declare(strict_types=1);

namespace App\DZ;

class Order
{
    private array $items = [];
    private Discount $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getDiscount(): Discount
    {
        return $this->discount;
    }

    public function add(OrderItem $item): void
    {
        $this->items[] = $item;
    }

    public function calculate(): float
    {
        $result = 0;
        foreach ($this->getItems() as $item) {
            if ($item->hasDiscount()) {
                $result += $this->discount->apply($item);
            } else {
                $result += $item->getPrice() * $item->getQuantity();
            }
        }

        return $result;
    }
}
