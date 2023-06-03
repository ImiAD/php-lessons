<?php
declare(strict_types=1);

namespace App\form\Validators;

class ValidatorImageFile extends ValidatorFile
{
    protected const FILE_SIZE = 1050000;
    protected const WHITE_LIST = ['jpg', 'png'];
}
