<?php
declare(strict_types = 1);
namespace Hammerspace\PureHelpers\Strings;

/**
 * Checks that a given string is present in another string
 */
function contains(string $needle, string $haystack): bool
{
    return (strpos($haystack, $needle) !== false);
}

/**
 * checks that at least one of the given strings is present in the target string
 */
function containsAnyOf(array $needles, string $haystack): bool
{
    $matchWord = __NAMESPACE__ . (string) microtime(true) . rand(0, 100000); // seriously unlikely to ever match this
    $checked = str_replace($needles, $matchWord, $haystack);
    return contains($matchWord, $checked);
}

/**
 * Checks that the provided $haystack starts with provided $needle
 */
function startsWith(string $needle, string $haystack): bool
{
    if (empty($needle)) {
        throw new \InvalidArgumentException('No needle provided');
    }

    return (0 === strpos($haystack, $needle));
}

/**
 * Truncate a string back to the nearest space
 */
function safeTruncate(string $input, int $length, string $suffix = '…'): string
{
    if ($length <= 0) {
        throw new \InvalidArgumentException('Length must be at least 1');
    }

    $input = trim($input);
    if (strlen($input) <= $length) {
        return $input;
    }

    // cut the input
    $input = substr($input, 0, $length);

    // find position of previous space
    $to = strrpos($input, ' ');
    if ($to === false) {
        return trim($input) . $suffix;
    }

    return substr($input, 0, $to) . $suffix;
}
