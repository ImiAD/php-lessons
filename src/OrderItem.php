<?php
declare(strict_types=1);

namespace App;

class OrderItem
{
    private string $title;
    private float $price;
    private int $quantity;
    private float $discount;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->price = floatval($data['price']);
        $this->quantity = intval($data['quantity']);
        $this->discount = floatval($data['discount']);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function hasDiscount(): bool
    {
        return !empty($this->getDiscount());
    }

    public function getFullPriceWithoutDiscount(): float
    {
        return $this->getPrice() * $this->getQuantity();
    }

    public function calculate(Order $item): float
    {
        $result = 0;
        match (true) {
            !empty($item->getDiscountOrder()) =>
                $result += $this->getFullPriceWithoutDiscount() - $this->getFullPriceWithoutDiscount() * $item->getDiscountOrder() / 100,
            !empty($this->hasDiscount()) =>
                $result += $item->getDiscount()->apply($this),
            default =>
                $result += $this->getFullPriceWithoutDiscount(),
        };


        return $result;
    }
}
