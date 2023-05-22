<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Lesson;

interface CostStrategy
{
    public function cost(Lesson $lesson): int;

    public function changeType(Lesson $lesson): string;
}
