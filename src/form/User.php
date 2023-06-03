<?php
declare(strict_types=1);

namespace App\form;

class User extends Person
{
    private bool $isBan;
    private ?string $avatar;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->isBan = $data['isBan'] ?? false;
        $this->avatar = $data['avatar'] ?? null;
    }

    public function getIsBan(): bool
    {
        return $this->isBan;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }
}
