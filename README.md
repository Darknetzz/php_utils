# php-utils
Disclaimer: This is so early in development it doesn't even have any useful stuff yet. Please come back later.


    # ────────────────────────────────────────────────────────── #
    #                                                            #
    #    $$\   $$\ $$$$$$$$\ $$$$$$\ $$\       $$$$$$\           #
    #    $$ |  $$ |\__$$  __|\_$$  _|$$ |     $$  __$$\          #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     $$ /  \__|         #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     \$$$$$$\           #
    #    $$ |  $$ |   $$ |     $$ |  $$ |      \____$$\          #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     $$\   $$ |         #
    #    \$$$$$$  |   $$ |   $$$$$$\ $$$$$$$$\\$$$$$$  |         #
    #     \______/    \__|   \______|\________|\______/          #
    #                                                            #
    # ────────────────────────────────────────────────────────── #
    # ----[    General but useful PHP utilities. ]-------------  #
    # ----[    Made with ❤️ by darknetzz         ]-------------  #
    # ----[    https://github.com/Darknetzz/     ]-------------  #
    # ────────────────────────────────────────────────────────── #


# Modules

## API

## Auth

## Calendar

## Crypto

## Debugger

## Files

## Funcs

## Images
Contains certain methods for manipulating images, such as blurring etc.

## Navigation

## Network
The network class contains methods for IP address translations, determining if an IP address is local etc.

### cidrToRange
Translates a CIDR range to the range.
```php
function cidrToRange(string $cidr) : array
```

### ipInRange
Determines if `$ip` is in the range between `$lowerip` and `$upperip`
```php
function ipInRange(string $ip, string $lowerip, string $upperip)
```

### getUserIP
Attempts to get user's real IP.
```php
function getUserIP(string $reverse_proxy = null, bool $return_array = false, bool $die_if_empty = false)
```

### usesReverseProxy
Attempts to determine if client is using reverse proxy.
```php
function usesReverseProxy(?string $proxy = null)
```

## Random

### genStr
Generates a string with the given `$charset`, with length `$len`
```php
function genStr(int $len = 24, mixed $charset = [], $required = [])
```

## Resources

## Session

## SQL

## Strings

## Times

## Vars
