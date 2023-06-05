<?php
declare(strict_types=1);

namespace App\form;

use PHPUnit\Framework\TestCase;

class UploaderTest extends TestCase
{
    public function testCanUploadImage(): void
    {
        $files = [
            'name' => 'file.png',
            'extension' => 'png',
            'tmp_name' => 'newFileName.png',
            'folderName' => 'upload',
            'newFile' => 'upload/1.png',
        ];

        $image = new File($files);

        $this->assertIsObject($image);
        $this->assertInstanceOf(File::class, $image);


        $this->assertIsString($image->getName());
        $this->assertIsString($image->getExtension());
        $this->assertIsString($image->getTmp());
        $this->assertIsString($image->save($files['folderName']));

        $this->assertEquals($files['name'], $image->getName());
        $this->assertEquals($files['extension'], $image->getExtension());
        $this->assertEquals($files['tmp_name'], $image->getTmp());
        $this->assertEquals($files['newFile'], $image->save($files['folderName']));
    }
}
