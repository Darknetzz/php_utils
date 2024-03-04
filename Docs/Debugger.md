# Debugger

## __construct
The constructor initializes required modules `Vars`.
```php
function __construct(bool $verbose = false)
{
    $this->verbose = $verbose;

    # Instantiate Vars class
    $this->vars     = new Vars();
}
```

## format
Takes an input of any kind, and returns prettified output.
```php
function format(mixed $input, string $type = 'info')
```

## output
Takes an input of any kind, and echoes prettified output.
```php
function output(mixed $txt, string $type = 'info', bool $die = false)
```

## debug_log
Given an already defined `$debug_array`, appends text to it for later output.
```php
function debug_log(array &$debug_array, string $txt, string $title = null)
```

## debug_print
Prints the previously defined `$debug_array` to output.
```php
function debug_print(array &$debug_array, $tableName = "Debug")
```

## throw_exception
Throws an exception that can be handled.
```php
function throw_exception($message) {
    throw new Exception($message);
}
```