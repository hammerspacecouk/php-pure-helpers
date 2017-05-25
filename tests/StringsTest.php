<?php

namespace Tests\Hammerspace\PureHelpers;

use Hammerspace\PureHelpers\Strings;
use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    public function testStartsWith()
    {
        $this->assertTrue(Strings::startsWith('ab', 'abcdef'));

        $this->assertFalse(Strings::startsWith('cd', 'abcdef'));
        $this->assertFalse(Strings::startsWith('ef', 'abcdef'));
        $this->assertFalse(Strings::startsWith('abcdef', ''));
        $this->assertFalse(Strings::startsWith('123', 1));
    }

    public function testStartsWithSameWithNoNeedleThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Strings::startsWith('', 'abcdef');
    }
}
