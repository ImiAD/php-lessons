<?php

namespace App\Users;

class Admin extends User
{
    private bool $isAdmin;

    public function setIsAdmin(bool $value): void
    {
        $this->isAdmin = $value;
    }

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }
}