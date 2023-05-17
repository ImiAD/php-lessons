<?php

namespace App\oldClass;

use App\Contracts\BookInformation;

class InformationBook implements BookInformation
{
    public function getTitle(): string
    {
        return 'Design Patterns in PHP 8: Singleton & Multi-ton';
    }

    public function getAuthor(): string
    {
        return 'Joshua Bloch';
    }
}
