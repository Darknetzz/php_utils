# Random
Includes methods for randomness!

## genStr
Generates a string with the given `$charset`, with length `$len`
```php
public function genStr(int $len = 24, mixed $charset = [], $required = [])
```

`int $len` - length of string to generate

`array $charset` - characters to create random string from

`array $required` - characters that **must** be included in the generated string

## array_pick_random
Returns one random value from the given array.
```php
public function array_pick_random(array $array)
```

`array $array` - array of elements to pick from

## roll
Rolls a random number between `$from` and `$to`.
```php
public function roll($from = 1, $to = 100)
```

`int $from` - the lowest number

`int $to` - the highest number