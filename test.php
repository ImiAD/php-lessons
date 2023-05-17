<?php
session_start();
setcookie('NameCooki', 'valueCooki', time()+300, '/handler.php');
print_r($_COOKIE['NameCooki']);
//print_r(session_id('string'));
//print_r(session_id());

if (!empty($_POST)) {

    $data = [];

    foreach ($_POST as $key => $value) {
        $data[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Заполните поле Name';
    } elseif (mb_strlen($data['name']) < 3) {
        $errors[] = 'Имя слишком короткое Имя!';
    }

    if (empty($data['email'])) {
        $errors[] = 'Заполните поле E-mail';
    } elseif (strlen($data['email']) < 5) {
        $errors[] = 'Имя слишком короткий E-mail!';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Не корректный E-mail';
    }

    if (empty($data['password'])) {
        $errors[] = 'Введите поле Password';
    } elseif (strlen($data['password']) < 6) {
        $errors[] = 'Пароль слишком короткий';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES ('{$data['name']}', '{$data['email']}', '{$data['password']}')";
        $_SESSION['success'] = $query;
        $_SESSION['user'] = $data;
//        header('Location: lk.php');die;
    }
    header('Location: index.php');die;
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (!empty($_SESSION['errors'])): ?>
    <?= implode('<br>', $_SESSION['errors']); ?>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>
<?php if (!empty($_SESSION['success'])): ?>
    <?= $_SESSION['success']; ?>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<form method="post">
    Введите имя:
    <input type="text" name="name" value=""><br>
    Введите e-mail:
    <input type="text" name="email" value=""><br>
    Введите пароль:
    <input type="text" name="password" value=""><br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>