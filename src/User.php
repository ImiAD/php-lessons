<?php
declare(strict_types=1);

namespace App;

abstract class User
{
    protected const TABLE_NAME = '';

    private ?int $id = null;
    private string $firstName;
    private string $lastName;
    private string $birthday;
    private string $createAt;
    private string $updateAt;
    private bool $isBan;

    private function __construct(array $data)
    {
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->birthday = Date::format('Y-m-d', $data['birthday']);
        $this->createAt = Date::format('Y-m-d', $data['createAt']);
        $this->updateAt = Date::format('Y-m-d', $data['updateAt']);
        $this->isBan = $data['isBan'];
    }

    public static function create(array $data): User
    {
        $item = new static($data);

        if (!empty($data['id'])) {
            $item->setId((int)$data['id']);
        }

        if ((!empty($data['isAdmin'])) && $item instanceof Admin) {
            $item->setIsAdmin($data['isAdmin']);
        }

        return $item;
    }

    public function getTableName(): string
    {
        return static::TABLE_NAME;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getIsBan(): bool
    {
        return $this->isBan;
    }

    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    public function getUpdateAt(): string
    {
        return $this->updateAt;
    }

    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function setFirstName(string $value): void
    {
        $this->firstName = $value;
    }

    public function setLastName(string $value): void
    {
        $this->lastName = $value;
    }

    public function setBirthday(string $value): void
    {
        $this->birthday = $value;
    }

    public function setIsBan(bool $value): void
    {
        $this->isBan = $value;
    }

    public function setCreateAt(string $value): void
    {
        $this->createAt = $value;
    }

    public function setUpdateAt(string $value): void
    {
        $this->updateAt = $value;
    }

    public function getStatus(User $item): string
    {
        return $item->getIsBan() ? 'Заблокирован' : 'Не заблокирован';
    }

    public function getRole(Admin $item): string
    {
        return $item->getIsAdmin() ? 'Администратор' : 'Пользователь';
    }

    public function getAll(User $item, array $data): string
    {
        $orderBy = "ORDER BY {$data['first_name']}";
        $orderBy .= $data['DESC'] ?  ' DESC' : ' ASC';

        return "SELECT * FROM {$item->getTableName()} {$orderBy}";
    }

    public function getOne(User $item, array $data): string
    {
        return "SELECT * FROM {$item->getTableName()} WHERE id = {$data['id']}";
    }

    public function insert(User $item, array $data): string
    {
        return "INSERT INTO {$item->getTableName()}(first_name, last_name, birthday) VALUES {$data['firstName']}, {$data['lastName']}, {$data['birthday']}";
    }

    public function update(User $item, array $data): string
    {
        return "UPDATE {$item->getTableName()} SET first_name = {$data['firstName']} WHERE id = {$data['id']}";
    }

    public function delete(User $item, ?int $id): string
    {
        return "DELETE {$item->getTableName()} WHERE id = {$id} LIMIT 1";
    }
}
