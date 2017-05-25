<?php

namespace Hammerspace\PureHelpers;

class Strings
{
    /**
     * Checks that the provided $haystack starts with provided $needle
     */
    public static function startsWith(string $needle, string $haystack): bool
    {
        if (empty($needle)) {
            throw new \InvalidArgumentException('No needle provided');
        }

        return (0 === strpos($haystack, $needle));
    }
}
