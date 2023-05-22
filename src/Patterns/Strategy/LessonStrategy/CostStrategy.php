<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\LessonStrategy;

interface CostStrategy
{
    public function cost(Lesson $lesson): int;

    public function chargeType(Lesson $lesson): string;
}
