<?php

namespace App;

abstract class User
{
    protected ?int $id;
    protected string $firstName;
    protected string $lastName;
    protected int $age;
    protected bool $isBan;

    public function __construct(?int $id, string $firstName, string $lastName, int $age, bool $isBan)
    {
        isset($id) ? $this->id = $id : $this->id = null;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->isBan = $isBan;
    }


    public function setId(int|User $value): void
    {
        is_object($value) ? $this->id = $value->id : $this->id = $value;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setFirstName(string|User $value): void
    {
        is_object($value) ? $this->firstName = $value->firstName : $this->firstName = $value;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string|User $value): void
    {
        is_object($value) ? $this->lastName = $value->lastName : $this->lastName = $value;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setAge(int|User $value): void
    {
        is_object($value) ? $this->age = $value->age : $this->age = $value;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setIsBan(bool|User $value): void
    {
        is_object($value) ? $this->isBan = $value->isBan : $this->isBan = $value;
    }

    public function getIsBan(): bool
    {
        return $this->isBan;
    }
}