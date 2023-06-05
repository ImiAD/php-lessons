<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\LessonStrategy;

class FixedCostStrategy implements CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return $lesson->getDuration();
    }

    public function chargeType(Lesson $lesson): string
    {
        return $lesson->getType();
    }
}
