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
        $this->isBan = $data['isBan'];
    }

    public static function create(array $data): User
    {
        $item = new static($data);

        if (!empty($data['id'])) {
            $item->setId((int)$data['id']);
        }

        //Как этот код из этих 3 одинкаковых if объеденить в 1 условие/цикл?
        if (!empty($data['birthday'])) {
            $str = explode('-', $data['birthday']);
            $result = $str[2] . '-' . $str[1] . '-' . $str[0];
            $item->setBirthday($result);
        }

        if (!empty($data['createAt'])) {
            $str = explode('-', $data['createAt']);
            $result = $str[2] . '-' . $str[1] . '-' . $str[0];
            $item->setCreateAt($result);
        }

        if (!empty($data['updateAt'])) {
            $str = explode('-', $data['updateAt']);
            $result = $str[2] . '-' . $str[1] . '-' . $str[0];
            $item->setUpdateAt($result);
        }


        if ((!empty($data['isAdmin'])) && $item instanceof Admin) {
            $item->setIsAdmin($data['isAdmin']);
        }

        return $item;
    }

    public function getAll(User $item, array $data): string
    {
        $orderBy = $data['DESC'] ? 'ORDER BY DESC' : 'ORDER BY ASC';

        return "SELECT * FROM {$item->getTableName()} {$data['firstName']} {$orderBy}";
    }

    // Не получается прямо в строку запроса поместить тернарный оператор сравнения с null.
    // Про тернарный прочитал, что в строку его нет возможности поместить. Только с конкатенацией, но у меня тогда
    // метод возвращал только SELECT и больше ничего. <- при использовании конкатенации.
    public function getOne(User $item, array $data): string
    {
        return "SELECT {$data['id']} FROM {$item->getTableName()}";
    }

    public function insert(User $item, array $data): string
    {
        return "INSERT INTO {$item->getTableName()} VALUES id = {$data['id']}, first_name = {$data['firstName']}, last_name = {$data['lastName']}";
    }

    public function update(User $item, array $data): string
    {
        return "UPDATE {$item->getTableName()} SET first_name = {$data['firstName']} WHERE id = {$data['id']}";
    }

    public function delete(User $item, ?int $id = null): string
    {
        $str = $id ? " WHERE id = {$id}" : '';

        return "DELETE {$item->getTableName()}{$str}";
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
}
