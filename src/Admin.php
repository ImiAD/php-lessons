<?php

namespace App;

class Admin extends User
{
    protected bool $isAdmin;

    public function __construct(?int $id, string $firstName, string $lastName, int $age, bool $isBan, bool $isAdmin = false)
    {
        parent::__construct($id, $firstName, $lastName, $age, $isBan);
        $this->isAdmin = $isAdmin;
    }

    public function setIsAdmin(bool|User $value): void
    {
        is_object($value) ? $this->isAdmin = $value->isAdmin : $this->isAdmin = $value;
    }

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }
}