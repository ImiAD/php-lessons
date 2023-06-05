<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Lesson;

abstract class Lesson
{
    public function __construct(
        private int $duration,
        private CostStrategy $costStrategy,
    ) {}

    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    public function changeType(): string
    {
        return $this->costStrategy->changeType($this);
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getType(): string
    {
        return 'Фиксированная оплата';
    }
}
