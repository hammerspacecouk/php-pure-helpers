<?php
declare(strict_types = 1);
namespace Tests\Hammerspace\PureHelpers;

use function Hammerspace\PureHelpers\Booleans\boolish;
use PHPUnit\Framework\TestCase;

class BoolishTest extends TestCase
{
    /**
     * @dataProvider scenarioProvider
     */
    public function testBoolish($input, bool $expected)
    {
        $this->assertSame($expected, boolish($input));
    }

    public function scenarioProvider()
    {
        return [
            'Integer true' => [1, true],
            'Integer false' => [0, false],
            'Integer false 2' => [2, false],
            'Bool true' => [true, true],
            'Bool false' => [false, false],
            'Random string' => ['bob', false],
            'Number string' => ['1', true],
            'y' => ['y', true],
            'Yes' => ['yes', true],
            'On' => ['yes', true],
            'True' => ['yes', true],
            'Capital Y' => ['Y ', true],
            'Capital Yes' => ['YES  ', true],
            'Capital On' => [' ON', true],
            'Capital True' => [' TrUe', true],
        ];
    }
}
