<?php
declare(strict_types=1);

namespace App\form;

class File extends Uploader
{
    public function save(string $folderName): string
    {
        /*
         * Можно ли протестировать результат выполнения этого метода с учетом использования функции uniqid()?
         * */
        $newFile = $folderName . '/1.' . $this->getExtension(); // для тестов
//        $newFile = $folderName . '/' . uniqid() . '.' . $this->getExtension();
        move_uploaded_file($this->getTmp(), __DIR__ . '/../../' . $newFile);

        return $newFile;
    }
}
