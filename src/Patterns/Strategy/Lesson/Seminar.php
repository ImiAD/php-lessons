<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Lesson;

class Seminar extends Lesson
{
    public function getType(): string
    {
        return 'Почасовая оплата';
    }
}
