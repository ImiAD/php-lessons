<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Lesson;


class FixedCostStrategy implements CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return $lesson->getDuration();
    }

    public function changeType(Lesson $lesson): string
    {
        return $lesson->getType();
    }
}
