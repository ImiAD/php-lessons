<?php

namespace App\Orders\Order;

use App\Orders\Contracts\Crud;
use App\Orders\Contracts\Orders;

class OrderCrud implements Orders, Crud
{
    public array $data = [
        'customer' => 'Ivan',
        'title' => 'books',
    ];

    public array $save = [];

    public function load(array $data): array
    {
        foreach ($data as $key => $value) {
            if (!in_array($key, $this->data)) {
                $this->data[$key] = $value;
            }
        }

        return $this->data;
    }

    public function save(int|string $param, mixed $value): array
    {
        $this->save[$param] = $value;

        return $this->save;
    }

    public function update(array $data): array
    {
        foreach ($data as $key => $value) {
            $this->save[$key] = $value;
        }

        return $this->save;
    }

    public function delete(int|string $param): array
    {
        unset($this->data[$param]);

        return $this->data;
    }
}