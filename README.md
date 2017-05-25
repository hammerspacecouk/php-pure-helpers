# PHP Pure Helpers

Sometimes there are functions you wish existed in the default PHP library. Simple pure functions that accept inputs and return an output.

This is a collection of useful helper functions that we use over and over again, so it was helpful to break them out into a utility library. They are all static functions with no state.

The production version of this library has no dependencies. It uses PHP 7.1 to be self-documenting with type hints.

Example:

```php
use Hammerspace\PureHelpers\Compare;

$a = 1;
$b = 1;
$c = 1;

// Are they all the same (must be the same type too)
Compare::allSame($a, $b, $c); // true

$c = 2;
Compare::allSame($a, $b, $c); // false
```

### Run tests
`composer test`

### Code sniff
`composer cs`