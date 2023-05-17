<?php

namespace App\oldClass;

use App\Contracts\BookInformation;

class SaveInformationBook implements BookInformation
{
    protected BookInformation $informationBook;

    public function __construct()
    {
        $this->informationBook = new InformationBook();
    }

    public function save(string $path): int|bool
    {
        $filename = $path . $this->informationBook->getTitle() . ' - ' . $this->informationBook->getAuthor();

        return file_put_contents(
            $filename,
            $this->informationBook->getTitle()
            . ' '
            . $this->informationBook->getAuthor()
        );
    }
}