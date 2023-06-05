<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Comparator;

class Context
{
    public function __construct(private Comparator $comparator) {}

    public function executeStrategy(array $elements): array
    {
        uasort($elements, [$this->comparator, 'compare']);

        return $elements;
    }
}
