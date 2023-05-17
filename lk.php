<?php
declare(strict_types=1);
error_reporting(-1);
session_start();

if (!empty($_SESSION['user'])) {
    print_r($_SESSION['user']);
    echo 'Привет! ' . $_SESSION['user']['name'];
} else {
    header('Location: /');die;
}