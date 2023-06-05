<?php
declare(strict_types=1);

namespace App\form\Validators;

class ValidatorTextFile extends ValidatorFile
{
    protected const FILE_SIZE = 500000;
    protected const WHITE_LIST = ['txt'];
}
