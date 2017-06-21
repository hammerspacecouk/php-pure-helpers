<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers;

use function Hammerspace\PureHelpers\Strings\contains;
use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    /**
     * @dataProvider scenarioProvider
     */
    public function testContains(string $needle, string $haystack, bool $expected)
    {
        $this->assertSame($expected, contains($needle, $haystack));
    }

    public function scenarioProvider()
    {
        return [
            'At start' => ['ab', 'abcdef', true],
            'At end' => ['ef', 'abcdef', true],
            'In middle' => ['cd', 'abcdef', true],
            'Exists twice' => ['ab', 'abcdab', true],
            'Not present' => ['bucket', 'abcdef', false],
            'Empty Haystack' => ['ab', '', false],
            'Case sensitive' => ['AB', 'ab', false],
        ];
    }
}
