# Network
The network class contains methods for IP address translations, determining if an IP address is local etc.

## cidrToRange
Translates a CIDR range to the range.
```php
function cidrToRange(string $cidr) : array
```

## ipInRange
Determines if `$ip` is in the range between `$lowerip` and `$upperip`
```php
function ipInRange(string $ip, string $lowerip, string $upperip)
```

## getUserIP
Attempts to get user's real IP.
```php
function getUserIP(string $reverse_proxy = null, bool $return_array = false, bool $die_if_empty = false)
```

## usesReverseProxy
Attempts to determine if client is using reverse proxy.
```php
function usesReverseProxy(?string $proxy = null)
```