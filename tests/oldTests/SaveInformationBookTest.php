<?php

namespace oldTests;

use App\oldClass\SaveInformationBook;
use PHPUnit\Framework\TestCase;

class SaveInformationBookTest extends TestCase
{
    public function testSave(): void
    {
        $object = new SaveInformationBook;
        $path = __DIR__;
        $this->assertEquals(60, $object->save($path));
    }
}