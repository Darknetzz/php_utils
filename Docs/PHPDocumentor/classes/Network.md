***

# Network





* Full name: `\Network`
* Parent class: [`\Base`](./Base.md)




## Methods


### cidrToRange

Convert CIDR notation to IP range.

```php
public cidrToRange(string $cidr): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cidr` | **string** | The CIDR notation. |


**Return Value:**

The IP range as an array with two elements: lower IP and upper IP.




***

### ipInRange

Check if an IP is within a given range.

```php
public ipInRange(string $ip, string $lowerip, string $upperip): bool
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ip` | **string** | The IP address to check. |
| `$lowerip` | **string** | The lower IP address of the range. |
| `$upperip` | **string** | The upper IP address of the range. |


**Return Value:**

True if the IP is within the range, false otherwise.




***

### getUserIP

Get the user's IP address.

```php
public getUserIP(string|null $reverse_proxy = null, bool $return_array = false, bool $die_if_empty = false): string|array|null
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$reverse_proxy` | **string&#124;null** | The IP address of the reverse proxy server. |
| `$return_array` | **bool** | Whether to return the result as an array or not. |
| `$die_if_empty` | **bool** | Whether to die if the user&#039;s IP cannot be determined. |


**Return Value:**

The user's IP address or an array with 'type' and 'userip' keys if $return_array is true. Returns null if $die_if_empty is false and the user's IP cannot be determined.




***

### usesReverseProxy

Check if the user is using a reverse proxy.

```php
public usesReverseProxy(string|null $proxy = null): bool
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$proxy` | **string&#124;null** | The IP address of the reverse proxy server. |


**Return Value:**

True if the user is using a reverse proxy, false otherwise.




***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
