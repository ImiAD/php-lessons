<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Comparator;

class IdComparator implements Comparator
{
    public function compare(mixed $a, mixed $b): int
    {
        return $a['id'] <=> $b['id'];
    }
}
