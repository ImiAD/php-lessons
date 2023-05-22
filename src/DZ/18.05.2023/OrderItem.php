<?php
declare(strict_types=1);

namespace App\DZ;

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

    public function getFullPrice(): float
    {
        return $this->getPrice() * $this->getQuantity();
    }

    public function calculate(Order $item): float
    {
        return match (true) {
            !empty($item->getDiscountOrder()) => $this->getFullPrice() - ($this->getFullPrice() * $item->getDiscountOrder() / 100),
            !empty($this->hasDiscount()) => $item->getDiscount()->apply($this),
            default => $this->getFullPrice(),
        };
    }
}
