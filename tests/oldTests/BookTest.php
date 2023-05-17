<?php

namespace oldTests;

use App\oldClass\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGetCurrentPage():void
    {
        $book = new Book();
        $this->assertEquals('текущее содержимое страницы', $book->getCurrentPage());
    }
}