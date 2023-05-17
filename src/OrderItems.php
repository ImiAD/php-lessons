<?php
declare(strict_types=1);

namespace App;

class OrderItems
{
    private string $title;
    private float $price;
    private int $quantity;
    private int $discount;
    private float $sumDiscount;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->price = floatval($data['price']);
        $this->quantity = intval($data['quantity']);
        $this->discount = intval($data['discount']);

        if ($this->hasDiscount()) {
            $this->sumDiscount = (new Discount())->getSum($this);
        }
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

    public function getSumDiscount(): float
    {
        return $this->sumDiscount;
    }

    public function hasDiscount(): bool
    {
        if ($this->getDiscount()) {
            return true;
        }

        return false;
    }
}
