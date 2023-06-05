<?php
declare(strict_types=1);

namespace App\form;

abstract class Uploader
{
    private string $name;
    private string $extension;
    private string $tmp;

    public function __construct(array $files)
    {
        $this->name = $files['name'];
        $this->extension = $this->setExtension();
        $this->tmp = $files['tmp_name'];
    }

    public function getName(): string
//    protected function getName(): string
    {
        return $this->name;
    }

    public function getExtension(): string
//    protected function getExtension(): string
    {
        return $this->extension;
    }

    public function getTmp(): string
//    protected function getTmp(): string
    {
        return $this->tmp;
    }

    public function setExtension(): string
//    protected function setExtension(): string
    {
        return strtolower(pathinfo($this->getName(), PATHINFO_EXTENSION));
    }

    abstract public function save(string $folderName): string;
}
