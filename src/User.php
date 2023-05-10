<?php
declare(strict_types = 1);

namespace App;

abstract class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $age;
    private bool $isBan;

    private function __construct(array $data)
    {
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->age = $data['age'];
        $this->isBan = $data['isBan'];
    }

    public static function create(array $data): User
    {
        $item = new static($data);

        if (!empty($data['id'])) {
            $item->setId($data['id']);
        }

        if (!empty($data['isAdmin']) && ($item instanceof Admin)) {
            $item->setIsAdmin($data['isAdmin']);
        }

        return $item;
    }

    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $value): void
    {
        $this->firstName = $value;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $value): void
    {
        $this->lastName = $value;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setAge(int $value): void
    {
        $this->age = $value;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setIsBan(bool $value): void
    {
        $this->isBan = $value;
    }

    public function getIsBan(): bool
    {
        return $this->isBan;
    }
}
