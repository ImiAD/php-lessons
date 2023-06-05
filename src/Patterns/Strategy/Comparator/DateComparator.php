<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Comparator;

use Exception;

class DateComparator implements Comparator
{
    /**
     * @throws Exception
     */
    public function compare(mixed $a, mixed $b): int
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \Datetime($b['date']);

        return $aDate <=> $bDate;
    }
}
