<?php

namespace App\Orders\Crud;

use App\Orders\Contracts\Crud;

abstract class CrudActions implements Crud
{
    abstract public function load(array $data): array;

    abstract public function save(int|string $param, mixed $value): array;

    abstract public function update(array $data): array;

    abstract public function delete(int|string $param): array;
}