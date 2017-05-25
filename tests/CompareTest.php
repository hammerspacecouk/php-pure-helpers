<?php

namespace Tests\Hammerspace\PureHelpers;

use Hammerspace\PureHelpers\Compare;
use PHPUnit\Framework\TestCase;

class CompareTest extends TestCase
{
    public function testAllSame()
    {
        $a = 1;
        $b = 1;
        $c = 1;

        $this->assertTrue(Compare::allSame($a, $b, $c));

        // different number
        $a = 2;
        $this->assertFalse(Compare::allSame($a, $b, $c));

        // different type
        $a = '1';
        $this->assertFalse(Compare::allSame($a, $b, $c));

        // type coercion would make these the same
        $this->assertFalse(Compare::allSame(0, null, ''));
    }

    public function testAllSameWithNoInputsThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Compare::allSame();
    }
}
