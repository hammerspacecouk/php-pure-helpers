<?php
declare(strict_types = 1);
namespace Hammerspace\PureHelpers\Comparisons;

/**
 * Checks that all the arguments provided of the same type and value
 */
function allSame(...$values): bool
{
    if (empty($values)) {
        throw new \InvalidArgumentException('At least one input must be provided');
    }

    // this takes O(n) time - can it be done more efficiently?
    $val = $values[0];
    foreach ($values as $v) {
        if ($v !== $val) {
            return false;
        }
    }
    return true;
}
