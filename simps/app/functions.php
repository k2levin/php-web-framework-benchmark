<?php

declare(strict_types=1);

namespace App;

use Simps\Utils\Env;

function env($key, $default = null)
{
    return (new Env())->get($key, $default);
}
