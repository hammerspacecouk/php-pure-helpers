<?php

namespace Tests\Hammerspace\PureHelpers;

use Hammerspace\PureHelpers\Comparisons;
use PHPUnit\Framework\TestCase;

class ComparisonsTest extends TestCase
{
    public function testAllSame()
    {
        $a = 1;
        $b = 1;
        $c = 1;

        $this->assertTrue(Comparisons::allSame($a, $b, $c));

        // different number
        $a = 2;
        $this->assertFalse(Comparisons::allSame($a, $b, $c));

        // different type
        $a = '1';
        $this->assertFalse(Comparisons::allSame($a, $b, $c));

        // type coercion would make these the same
        $this->assertFalse(Comparisons::allSame(0, null, ''));
    }

    public function testAllSameWithNoInputsThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Comparisons::allSame();
    }
}
