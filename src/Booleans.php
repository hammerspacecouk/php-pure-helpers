<?php
declare(strict_types = 1);
namespace Hammerspace\PureHelpers\Booleans;

/**
 * matches common "truthy" inputs to become booleans
 * True values are: 1, yes, on, true
 * If a "true" is recognised it will return as such
 * Any other unrecognised values will be false
 */
function boolish($input): bool
{
    if ($input === true || $input === 1) {
        return true;
    }

    $input = strtolower(trim((string) $input));

    return (in_array($input, [
        '1',
        'y',
        'yes',
        'on',
        'true'
    ]));
}
