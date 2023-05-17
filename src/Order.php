<?php
declare(strict_types=1);

namespace App;
// Класс Коллекция?
class Order
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function add(OrderItems $item): void
    {
        $this->items[] = $item;
    }

    public function calculate(): float
    {
        return (new Calculate())->makeSum($this);
    }
}
