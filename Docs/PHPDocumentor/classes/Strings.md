***

# Strings

Class Strings

A class to handle string manipulation

* Full name: `\Strings`
* Parent class: [`\Base`](./Base.md)




## Methods


### slugify

slugify

```php
public slugify(string $string, string $replace = &#039;_&#039;, int $lenCap): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to slugify. |
| `$replace` | **string** | The character to replace spaces with. Default is &#039;_&#039;. |
| `$lenCap` | **int** | The maximum length of the slug. Default is 0. |





***

### hide

hide

```php
public hide(string $string, int $visibility = 3): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to hide. |
| `$visibility` | **int** |  |





***

### cap

cap

```php
public cap(string $string, int $maxlen = 30): string
```

Cap a string to a certain length






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** | The string to cap |
| `$maxlen` | **int** | The maximum length of the string. Default is 30. |


**Return Value:**

The capped string




***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
