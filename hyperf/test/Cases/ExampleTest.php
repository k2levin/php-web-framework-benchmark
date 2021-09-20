<?php

declare(strict_types=1);

namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

class ExampleTest extends HttpTestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertTrue(is_array($this->get('/')));
    }
}
