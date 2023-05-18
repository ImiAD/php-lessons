<?php
declare(strict_types=1);

namespace App;

class OrderItem
{
    private string $title;
    private float $price;
    private int $quantity;
    private int $discount;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->price = floatval($data['price']);
        $this->quantity = intval($data['quantity']);
        $this->discount = intval($data['discount']);
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

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function hasDiscount(): bool
    {
        return !empty($this->getDiscount());
    }
}
