<?php
declare(strict_types=1);
error_reporting(-1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';
//print_r (pathinfo('index.php'));


$request = new \App\form\Request();

if ($request->isPost()) {
    $validatorForm = new \App\form\Validators\ValidatorForm();
    $result = $validatorForm
        ->load($request->post())
        ->clear()
        ->isEmpty()
        ->isValidEmail()
        ->except('id', 'password') // Не понял откуда брались эти поля, чтобы их исключать.
        ->toArray();

    $errors = $validatorForm->getErrors();

    if (!empty($request->hasFiles('file'))) {
        $extensions = (new \App\form\Validators\ValidatorFile())
            ->load($request->files('file'))
            ->getExtension();

        $validator = \App\form\Validators\ValidateFactory::create($extensions);
        $validator->load($request->files('file'))->check();

        /*
         * Почему здесь не отрабатывает цепочка? Если создание объекта обернуть в скобки и с помощью объектного
         * оператора вызывать методы по этапно?
         * $validatorText = new \App\form\Validators\ValidatorTextFile();
         * $validatorText->load($request->files('file'))->check();
         * */

        $file = new \App\form\File($request->files('file'));

        $fileErrors = !empty($validator->getErrors()) ? ['error_file' => $validator->getErrors()] : [];
        $fileName = empty($validator->getErrors()) ? $file->save('uploads') : '';
    }

    $errorsData = array_merge($errors, $fileErrors ?? []);

    if (!empty($errorsData)) {
        $_SESSION['errors'] = $errorsData;
        header('Location: /');
        die;
    }

    $user = new \App\form\User(array_merge($result, ['avatar' => $fileName ?? '']));
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Валидация формы</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <form action="/" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" name="name" value="" class="form-control">
                    <?php if (!empty($_SESSION['errors']['name'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['errors']['name']; ?></div >
                        <?php unset($_SESSION['errors']['name']); ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" value="" class="form-control">
                    <?php if (!empty($_SESSION['errors']['email'])): ?>
                        <div  class="alert alert-danger"><?= $_SESSION['errors']['email']; ?></div >
                        <?php unset($_SESSION['errors']['email']); ?>
                    <?php endif ?>
                    <?php if (!empty($_SESSION['errors']['invalid_email'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['errors']['invalid_email']; ?></div >
                        <?php unset($_SESSION['errors']['invalid_email']); ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="inputGroupFile" class="input-group-text">Загрузка файла</label>
                    <input id="inputGroupFile" type="file" name="file" value="" class="form-control">
                </div>
                <?php if (!empty($_SESSION['errors']['error_file'])): ?>
                    <?php foreach ($_SESSION['errors']['error_file'] as $value): ?>
                        <p class="alert alert-danger"><?= $value; ?></p>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']['error_file']); ?>
                <?php endif ?>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
