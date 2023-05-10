<?php
declare(strict_types=1);

namespace App;

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
