<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testStaticFormatDate(): void
    {
        $format = 'Y-m-d';
        $date = '12-04-2023';
        $correctDate = '2023-04-12';

        $this->assertIsString(Date::format($format, $date));

        $this->assertEquals($correctDate, Date::format($format, $date));
    }
}
