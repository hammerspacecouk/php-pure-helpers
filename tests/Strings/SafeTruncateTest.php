<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers;

use function Hammerspace\PureHelpers\Strings\safeTruncate;
use PHPUnit\Framework\TestCase;

class SafeTruncateTest extends TestCase
{
    /**
     * @dataProvider scenarioProvider
     */
    public function testTruncateSimple(string $input, int $length, string $expected)
    {
        $this->assertSame($expected, safeTruncate($input, $length));
    }

    public function scenarioProvider()
    {
        return [
            'Requested Longer' => ['1234 1234 1234', 15, '1234 1234 1234'],
            'Requested Same' => ['1234 1234 1234', 14,'1234 1234 1234'],
            'Requested Same with end space' => ['1234 1234 1234 ', 15, '1234 1234 1234'],
            'Requested At first space' => ['1234 1234', 5, '1234…'],
            'Requested Shorter' => ['1234 1234 1234', 13, '1234 1234…'],
            'Requested Shorter than first space (hard cut)' => ['1234 1234 1234', 3, '123…'],
            'No spaces (hard cut)' => ['123451234512345', 4, '1234…'],
        ];
    }

    public function testTooShort()
    {
        $this->expectException(\InvalidArgumentException::class);
        safeTruncate('123', 0);
        safeTruncate('123', -1);
    }

    public function testSuffix()
    {
        $this->assertSame('123BOB', safeTruncate('123 456', 3, 'BOB'));
    }
}
