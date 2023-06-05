<?php
declare(strict_types=1);

namespace App\Patterns\Strategy\Lesson;

use PHPUnit\Framework\TestCase;

class LessonTest extends TestCase
{
    public function testCanCreateLectureAndSeminarObject(): void
    {
        $data = [
            'durationLecture' => 30,
            'durationOneHour' => 5,
            'durationSeminar' => 25,
            'lectureType' => 'Фиксированная оплата',
            'seminarType' => 'Почасовая оплата',
            'fixedCost' => new FixedCostStrategy(),
            'oneHourCost' => new TimeCostStrategy(),
        ];

        $lecture = new Lecture($data['durationLecture'], $data['fixedCost']);

        $this->assertIsObject($lecture);
        $this->assertInstanceOf(Lesson::class, $lecture);
        $this->assertInstanceOf(Lecture::class, $lecture);
        $this->assertIsInt($lecture->getDuration());
        $this->assertIsInt($lecture->cost());
        $this->assertIsString($lecture->getType());
        $this->assertIsString($lecture->changeType());
        $this->assertEquals($data['durationLecture'], $lecture->cost());
        $this->assertEquals($data['lectureType'], $lecture->changeType());

        $seminar = new Seminar($data['durationOneHour'], $data['oneHourCost']);

        $this->assertIsObject($seminar);
        $this->assertInstanceOf(Lesson::class, $seminar);
        $this->assertInstanceOf(Seminar::class, $seminar);
        $this->assertIsInt($seminar->getDuration());
        $this->assertIsInt($seminar->cost());
        $this->assertIsString($seminar->getType());
        $this->assertIsString($seminar->changeType());
        $this->assertEquals($data['durationSeminar'], $seminar->cost());
        $this->assertEquals($data['seminarType'], $seminar->changeType());
    }
}
