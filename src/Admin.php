<?php

namespace App;

class Admin extends User
{
    public function __construct(
        ?int $id,
        string $firstName,
        string $lastName,
        int $age, bool $isBan,
        protected bool $isAdmin = false
    ){
        parent::__construct($id, $firstName, $lastName, $age, $isBan);
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