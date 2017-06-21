<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers;

use function Hammerspace\PureHelpers\Strings\containsAnyOf;
use PHPUnit\Framework\TestCase;

class ContainsAnyOfTest extends TestCase
{
    /**
     * @dataProvider scenarioProvider
     */
    public function testContainsAnyOf(array $needle, string $haystack, bool $expected)
    {
        $this->assertSame($expected, containsAnyOf($needle, $haystack));
    }

    public function scenarioProvider()
    {
        return [
            'At start' => [
                ['ab'],
                'abcdef',
                true
            ],
            'At end' => [
                ['ef'],
                'abcdef',
                true
            ],
            'In middle' => [
                ['cd'],
                'abcdef',
                true
            ],
            'Only second needle' => [
                ['one','ab'],
                'abcdab',
                true
            ],
            'Not present' => [
                ['bucket'],
                'abcdef',
                false
            ],
            'Empty Haystack' => [
                ['ab'],
                '',
                false
            ],
            'Case sensitive' => [
                ['AB'],
                'ab',
                false
            ],
        ];
    }
}
