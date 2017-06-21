<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers\Comparisons;

use function Hammerspace\PureHelpers\Comparisons\allSame;
use PHPUnit\Framework\TestCase;

class AllSameTest extends TestCase
{
    public function testAllSame()
    {
        $a = 1;
        $b = 1;
        $c = 1;

        $this->assertTrue(allSame($a, $b, $c));

        // different number
        $a = 2;
        $this->assertFalse(allSame($a, $b, $c));

        // different type
        $a = '1';
        $this->assertFalse(allSame($a, $b, $c));

        // type coercion would make these the same
        $this->assertFalse(allSame(0, null, ''));
    }

    public function testAllSameWithNoInputsThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        allSame();
    }
}
