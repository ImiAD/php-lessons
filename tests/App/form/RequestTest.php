<?php
declare(strict_types=1);

namespace App\form;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testCanCreateRequest(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
//        $_SERVER['REQUEST_METHOD'] = 'GET';

        $post = 'namePOST';
        $_POST[$post] = 'namePOST';

        $get = 'nameGET';
        $_GET[$get] = 'nameGET';

        $fileName = 'fileName';
        $_FILES[$fileName]['name'] = 'string';

        $fileNameForMethodFiles = 'file';
        $_FILES[$fileNameForMethodFiles] = [1];

        $request = new Request();

        $this->assertIsObject($request);
        $this->assertInstanceOf(Request::class, $request);

        $this->assertIsString($request->requestMethod());

        $this->assertIsBool($request->isGet());
//        $this->assertTrue($request->isGet());
        $this->assertFalse($request->isGet());

        $this->assertIsBool($request->isPost());
        $this->assertTrue($request->isPost());
//        $this->assertFalse($request->isPost());

        $this->assertIsArray($request->post());
        $this->assertIsString($request->post($post));

        $this->assertIsArray($request->get());
        $this->assertIsString($request->get($get));

        $this->assertIsBool($request->hasFiles());
        $this->assertFalse($request->hasFiles());
        $this->assertTrue($request->hasFiles($fileName));

        $this->assertIsArray($request->files());
        $this->assertIsArray($request->files($fileNameForMethodFiles));

        $this->assertEquals($_POST, $request->post());
        $this->assertEquals($_POST[$post], $request->post($post));
        $this->assertEquals($_GET, $request->get());
        $this->assertEquals($_GET[$get], $request->get($get));
        $this->assertEquals($_FILES[$fileNameForMethodFiles], $request->files($fileNameForMethodFiles));
        $this->assertEquals($_FILES, $request->files());
    }
}
