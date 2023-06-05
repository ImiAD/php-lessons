<?php
declare(strict_types=1);

namespace App\form;

class Request
{
    public function requestMethod(): string
//    private function requestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isGet(): bool
    {
        return \strtoupper($this->requestMethod()) === 'GET';
    }

    public function isPost(): bool
    {
        return \strtoupper($this->requestMethod()) === 'POST';
    }

    //Почему выдает синтаксическую ошибку, если выставить 2 возвращаемых типа?
    public function post(?string $name = null): array
    {
        return is_null($name) ? $_POST : $_POST[$name];
    }

    //Почему выдает синтаксическую ошибку, если выставить 2 возвращаемых типа?
    public function get(?string $name = null): array
    {
        return is_null($name) ? $_GET : $_GET[$name];
    }

    public function hasFiles(?string $name = null): bool
    {
        return !empty($_FILES[$name]['name']);
    }

    public function files(?string $name = null): array
    {
        return is_null($name) ? $_FILES : $_FILES[$name];
    }
}
