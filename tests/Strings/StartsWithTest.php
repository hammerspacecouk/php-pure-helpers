<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers;

use function Hammerspace\PureHelpers\Strings\startsWith;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    public function testStartsWith()
    {
        $this->assertTrue(startsWith('ab', 'abcdef'));

        $this->assertFalse(startsWith('cd', 'abcdef'));
        $this->assertFalse(startsWith('ef', 'abcdef'));
        $this->assertFalse(startsWith('abcdef', ''));
    }

    public function testStartsWithSameWithNoNeedleThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        startsWith('', 'abcdef');
    }
}
