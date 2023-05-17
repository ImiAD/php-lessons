<?php
declare(strict_types=1);
namespace App\Users\Admin\Customer;

class Admin extends User
{
    protected const TABLE_NAME = 'admins';

    private bool $isAdmin = false;

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $value): void
    {
        $this->isAdmin = $value;
    }
}
