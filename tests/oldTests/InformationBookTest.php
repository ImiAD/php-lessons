<?php

namespace oldTests;

use App\oldClass\InformationBook;
use PHPUnit\Framework\TestCase;

class InformationBookTest extends TestCase
{
    public function testGetTitle(): void
    {
        $bookInfo = new InformationBook();
        $this->assertEquals('Design Patterns in PHP 8: Singleton & Multi-ton', $bookInfo->getTitle());
    }

    public function testGetAuthor(): void
    {
        $bookInfo = new InformationBook();
        $this->assertEquals('Joshua Bloch', $bookInfo->getAuthor());
    }
}