<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Comparator;

interface Comparator
{
    /**
     * @param mixed $a
     * @param mixed $b
     * @return int
     */
    public function compare(mixed $a, mixed $b): int;
}
