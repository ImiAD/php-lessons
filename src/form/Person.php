<?php
declare(strict_types=1);

namespace App\form;

abstract class Person
{
    private int $id;
    private string $name;
    private string $email;

    public function __construct(array $data)
    {
        $this->id = intval($data['id'] ?? 0);
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
