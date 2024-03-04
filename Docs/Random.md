# Random
Includes methods for randomness!

## genStr
Generates a string with the given `$charset`, with length `$len`
```php
public function genStr(int $len = 24, mixed $charset = [], $required = [])
```

## array_pick_random
Returns one random value from the given array.
```php
public function array_pick_random(array $array)
```

## roll
Rolls a random number between `$from` and `$to`.
```php
public function roll($from = 1, $to = 100)
```